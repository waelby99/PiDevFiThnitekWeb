<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeolocalisationController extends AbstractController
{
    #[Route('/geolocalisation', name: 'app_geolocalisation')]
    public function index(): Response
    {
        return $this->render('geolocalisation/index.html.twig', [
            'controller_name' => 'GeolocalisationController',
        ]);
    }
}
