<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/depistage", name="depistage")
     */
    public function depistage()
    {
        $user = $this->getUser();
        return $this->render('default/depistage.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/sondage", name="sondage")
     */
    public function sondage()
    {
        $user = $this->getUser();
        return $this->render('default/sondage.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/informations", name="informations")
     */
    public function informations()
    {
        $user = $this->getUser();
        return $this->render('default/informations.html.twig', [
            'user' => $user
        ]);
    }
}
