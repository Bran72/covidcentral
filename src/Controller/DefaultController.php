<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

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

    /**
     * @Route("/live", name="liveAPI")
     */
    public function liveAPI()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.covid19api.com/total/country/france')->toArray();

        $labelData = array();
        $labelDataPerDay = array();
        $arr1 = array();
        $arr2 = array();
        $arr3 = array();
        $casePerDay = array();
        foreach ($response as $k => $day) {
            if ($k == 0) {
                array_push($casePerDay, $day['Confirmed']);
            } else {
                array_push($casePerDay, ($day['Confirmed'] - $response[$k-1]['Confirmed']));
            }
            array_push($labelDataPerDay, date('d M', strtotime($day['Date'])));

            array_push($arr1, $day['Confirmed']);
            array_push($arr2, $day['Deaths']);
            array_push($arr3, $day['Recovered']);
            array_push($labelData, date('d M', strtotime($day['Date'])));
        }

        // var_dump($datas);

        // var_dump(json_encode($response));
        return $this->render('default/liveAPI.html.twig', [
            'casePerDay' => $casePerDay,
            'datas' => end($response),
            'arr1' => $arr1,
            'arr2' => $arr2,
            'arr3' => $arr3,
            'labelData' => $labelData,
            'labelDataPerDay' => $labelDataPerDay,
        ]);
    }
}
