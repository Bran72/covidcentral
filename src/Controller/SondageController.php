<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\QuestionSondage;
use App\Form\SondageType;

class SondageController extends AbstractController
{
    /**
     * @Route("/sondage", name="sondage")
     */
    public function makeSondage(Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $question = new QuestionSondage ();

        $form = $this->createForm(SondageType::class, $question);

        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form -> isValid()) {
            $entityManager -> persist($question);
            $entityManager -> flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('sondage/index.html.twig', [
            'formSondage' => $form->createView()
        ]);
    }
}
