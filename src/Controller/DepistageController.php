<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\QuestionDepistage;
use App\Form\DepistageType;

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

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();

            $question->setUser($user);
            $entityManager -> persist($question);
            $entityManager -> flush();

            $points = 0;
            // var_dump($form->get('q1')->getData());
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


            return $this->render('depistage/rendezvous.html.twig', [
                'points' => $points
            ]);
        }

        return $this->render('depistage/index.html.twig', [
            'formDepistage' => $form->createView()
        ]);
    }
}