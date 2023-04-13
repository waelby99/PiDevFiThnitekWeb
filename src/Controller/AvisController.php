<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Avis;
use App\Form\AvisType;
use Symfony\Component\HttpFoundation\Request;


class AvisController extends AbstractController
{
    #[Route('/avis', name: 'app_avis')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Avis::class);
        $Avis = $repo->findAll();

    
        return $this->render('avis/index.html.twig', [
            'controller_name' => 'AvisController',
            'Avis' => $Avis,
        ]);
    }

    #[Route('/addavis', name: 'add_avis')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avis = new Avis();
        $form = $this->createForm(AvisType::class, $avis);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
           
            $entityManager->persist($avis);
            $entityManager->flush();
            return $this->redirectToRoute('app_avis');
        }
        return $this->render('avis/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/avisdetail/{id}', name: 'detail_avis')]
    public function detail($id,ManagerRegistry $doctrine,EntityManagerInterface $entityManager): Response
    {
        $avis =  $doctrine->getRepository(Avis::class)->find($id);
  
        return $this->render('avis/details.html.twig', [
            'controller_name' => 'AvisController',
            'Avis'=>$avis
        ]);
    }

    #[Route('/modifierAvis/{id}', name: 'modifier_Avis')]
    public function modif($id,Request $request, EntityManagerInterface $entityManager,ManagerRegistry $doctrine): Response
    {
        $avis =  $doctrine->getRepository(Avis::class)->find($id);
        $form = $this->createForm(AvisType::class, $avis);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
            return $this->redirectToRoute('app_avis');
        }
        return $this->render('avis/modifier.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/deleteavis/{id}', name: 'delete_avis')]
    public function deleteAvis($id,ManagerRegistry $doctrine){
        $avis=$doctrine->getRepository(Avis::class)->find($id);
        $av=$doctrine->getManager();
        $av->remove($avis);
        $av->flush();
        return $this->redirectToRoute('app_avis');
    }
}
