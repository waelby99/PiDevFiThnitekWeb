<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Evenement;

class EvenementController extends AbstractController
{
    #[Route('/evenement', name: 'app_evenement')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Evenement::class);
        $Events = $repo->findAll();
        return $this->render('evenement/index.html.twig', [
            'controller_name' => 'EvenementController',
            'events'=>$Events
        ]);
    }

    /*#[Route('/listeclassroom', name: 'app_classroom')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Classroom::class);
        $classrooms = $repo->findAll();
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
            'classrooms'=>$classrooms
        ]);
    }*/
}
