<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $authenticator, \Swift_Mailer $mailer): Response
    {
        $hasAccess = $this->getUser();
        if ($hasAccess) return $this->redirectToRoute('profile');

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email
            // Sending mail
            $userMail = $user->getEmail();
            $username = $user->getUsername();
            $body = "<h3>CovidCentral - Inscription</h3>
                <br><br>
                Bonjour ".$username ." ! <br>
                <br><br>
                Vous recevez ce mail suite à votre dépistage sur le site CovidCentral. <br>
                Nom d'utilisateur: $username
                Adresse email: $userMail
                <br><br>
                N'hésitez pas à découvrir le site et vous faire dépister !
                <br><br>
                L'équipe de CovidCentral.";

            $body = "<h3>Inscription au site CovidCentral</h3>
                <br>
                Bonjour ".$username ." ! <br>
                <br>
                
                <br><br>
                N'hésitez pas à découvrir le site !
                <br>
                L'équipe de CovidCentral.";

            $message = (new \Swift_Message('Inscription - CovidCentral'))
                ->setFrom('covidcentral@brandonleininger.fr')
                ->setTo($userMail)
                ->setBody($body, 'text/html');

            $mailer->send($message);

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
