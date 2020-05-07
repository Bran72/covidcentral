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
    public function rendezVous(Request $request)
    {
        $userConnected = $this->getUser();
        $user = $this->getUser();

        $form = $this->createForm(RdvFormType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // TODO: envoyer un mail
            $em = $this->getDoctrine()->getManager();
            $user->setRdvSubmitted(1);
            $em->persist($user);
            $em->flush();

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
