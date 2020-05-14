<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RdvFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\QuestionDepistage;
use App\Form\DepistageType;

class DepistageController extends AbstractController
{
    /**
     * @Route("/depistage", name="depistage")
     * @param Request $request
     * @return Response
     */
    public function makeDepistage(Request $request)
    {
        $user = $this->getUser();
        if(($user->getPointsDepistage() != null) || ($user->getRdvSubmitted() == 1)) {
            return $this->redirectToRoute('rendezvous');
        }

        $points = 0;

        $question = new QuestionDepistage();

        $form = $this->createForm(DepistageType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $user = $this->getUser();

            $question->setUser($user);
            $entityManager->persist($question);
            $entityManager->flush();

            $points += intval($form->get('q1')->getData())*3;
            $points += intval($form->get('q2')->getData())*10;
            $points += intval($form->get('q3')->getData())*10;
            if (intval($form->get('q4')->getData()) > 38)
                $points += 10;
            $points += intval($form->get('q5')->getData())*10;
            $points += intval($form->get('q6')->getData())*10;
            if (intval($form->get('q4')->getData()) > 110)
                $points += 10;
            $points += intval($form->get('q8')->getData())*10;

            $this->setUserDepistage($user, $points);

            return $this->redirectToRoute('rendezvous');
        }

        return $this->render('depistage/index.html.twig', [
            'formDepistage' => $form->createView()
        ]);
    }

    public function setUserDepistage(User $user, $data_depistage)
    {
        $em = $this->getDoctrine()->getManager();

        $user->setPointsDepistage($data_depistage);
        $em->persist($user);
        $em->flush();

        return true;
    }

    /**
     * @Route("/depistage/rdv", name="rendezvous")
     * @param Request $request
     * @return Response
     */
    public function rendezVous(Request $request, \Swift_Mailer $mailer)
    {
        // Let's detect if user has the needed data to access this page
        $user = $this->getUser();
        if(($user->getPointsDepistage() == null)) {
            return $this->redirectToRoute('depistage');
        }

        $userConnected = $this->getUser();
        $user = $this->getUser();

        $form = $this->createForm(RdvFormType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user->setRdvSubmitted(1);
            $em->persist($user);
            $em->flush();

            $formCity = $form->get('city')->getData();
            $formDate = $form->get('date')->getData();

            // Sending mail
            $userMail = $user->getEmail();
            $username = $user->getUsername();
            $body = "<h3>CovidCentral - Dépistage et demande de rendez-vous</h3>
                <br><br>
                Bonjour ".$username ." ! <br>
                <br><br>
                Vous recevez ce mail suite à votre dépistage sur le site CovidCentral. <br>
                Vous trouverez ci-dessous les informations concernant votre rendez-vous: <br><br>
                Ville du rendez-vous: ".$formCity."<br>
                Date du rendez-vous: ".date('d/m/Y à H:i', strtotime($formDate))."<br><br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias at autem consequatur dignissimos dolore expedita incidunt iste, maiores maxime necessitatibus, obcaecati perspiciatis quis quisquam quod reprehenderit, tenetur vel veritatis! <br>
                <br>
                L'équipe de CovidCentral.";

            $message = (new \Swift_Message('Inscription - CovidCentral'))
                ->setFrom('covidcentral@brandonleininger.fr')
                ->setTo($userMail)
                ->setBody($body, 'text/html');

            $mailer->send($message);

            // redirectToRoute pour éviter le renvoit du form au refresh
            return $this->redirectToRoute('rendezvous');
        }

        return $this->render('depistage/rendezvous.html.twig', [
            'rdvForm' => $form->createView(),
            'user' => $user,
            'points' => $userConnected->getPointsDepistage()
        ]);
    }
}
