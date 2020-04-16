<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\QuestionSondage;
use App\Form\SondageType;

class SondageController extends AbstractController
{
    /**
     * @Route("/sondage", name="sondage")
     */
    public function index()
    {
        $question = new QuestionSondage ();

        $form = $this->createForm(SondageType::class, $question);

        return $this->render('sondage/index.html.twig', [
            'controller_name' => 'SondageController',
            'formSondage' => $form->createView()
        ]);
    }
}
