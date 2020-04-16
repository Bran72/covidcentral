<?php

namespace App\Controller;

use App\Entity\QuestionDepistage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\DepistageType;

class DepistageController extends AbstractController
{
    /**
     * @Route("/depistage", name="depistage")
     */
    public function index()
    {
        $questions = new QuestionDepistage ();

        $form = $this->createForm(DepistageType::class, $questions);

        return $this->render('depistage/index.html.twig', [
            'controller_name' => 'DepistageController',
            'formDepistage' => $form->createView()
        ]);
    }
}
