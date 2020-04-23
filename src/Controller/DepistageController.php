<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\QuestionDepistage;
use App\Form\DepistageType;
use Symfony\Component\Security\Core\Security;

class DepistageController extends AbstractController
{
    /**
     * @Route("/depistage", name="depistage")
     */
    public function makeDepistage(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $question = new QuestionDepistage();

        $form = $this->createForm(DepistageType::class, $question);

        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid()){
            if ($this->getUser()) {
                $user = $this->getUser();
                $question->setUser($user);
                $entityManager -> persist($question);
                $entityManager -> flush();

                return $this->render('depistage/rendezvous.html.twig');
            }
        }

        return $this->render('depistage/index.html.twig', [
            'formDepistage' => $form->createView()
        ]);
    }
}
