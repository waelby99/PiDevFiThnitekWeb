<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculedistanceController extends AbstractController
{
    #[Route('/calculedistance', name: 'app_calculedistance')]
    public function index(): Response
    {
        return $this->render('calculedistance/index.html.twig', [
            'controller_name' => 'CalculedistanceController',
        ]);
    }

    function CalculerdistanceController($lat1, $lon1, $lat2, $lon2)
    {

        $lat1 = 48.8584;
        $lon1 = 2.2945;


        $lat2 = 40.6892;
        $lon2 = -74.0445;
        $distance = distance($lat1, $lon1, $lat2, $lon2);
        return $this->render('distance.html.twig', [
            'distance' => $distance
        ]);
    }
}
