<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Evenement;
use App\Form\EvenementType;
use Symfony\Component\HttpFoundation\Request;

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

    #[Route('/addevent', name: 'add_event')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($evenement);
            $entityManager->flush();
            return $this->redirectToRoute('app_evenement');
        }
        return $this->render('evenement/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/deleteevenement/{id}', name: 'delete_evenement')]
    public function deleteEvenement($id,ManagerRegistry $doctrine){
        $evenement=$doctrine->getRepository(Evenement::class)->find($id);
        $em=$doctrine->getManager();
        $em->remove($evenement);
        $em->flush();
        return $this->redirectToRoute('app_evenement');
    }
    #[Route('/modifEvenement/{id}', name: 'modif_evenement')]
    public function modif($id,Request $request, EntityManagerInterface $entityManager,ManagerRegistry $doctrine): Response
    {
        $evenement =  $doctrine->getRepository(Evenement::class)->find($id);
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
            return $this->redirectToRoute('app_evenement');
        }
        return $this->render('evenement/modifier.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/evenementdetail/{id}', name: 'detail_event')]
    public function detail($id,ManagerRegistry $doctrine,EntityManagerInterface $entityManager): Response
    {
        $evenement =  $doctrine->getRepository(Evenement::class)->find($id);
        $sponsors = $doctrine->getRepository(Evenement::class)->getSponsorByEvenementId($entityManager, $id);
      return $this->render('evenement/details.html.twig', [
            'controller_name' => 'EvenementController',
            'events'=>$evenement,
          'sponsors'=>$sponsors
      ]);
    }
}
