<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Reclamation;
use App\Form\ReclamationType;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ReclamationRepository;

class ReclamationController extends AbstractController
{
    #[Route('/reclamation', name: 'app_reclamation')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Reclamation::class);
        $Reclamations = $repo->findAll();

        return $this->render('reclamation/index.html.twig', [
            'controller_name' => 'ReclamationController',
            'Reclamations'=>$Reclamations
        ]);
    }
    #[Route('/addreclamation', name: 'add_reclamation')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reclamation = new Reclamation();
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

            $image = $form->get('image')->getData();
            if ($image) {
                $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $newFilename = 'images/attachments/' . $originalFilename . '.' . $extension;

    
                    $image->move(
                        $this->getParameter('dossier_images'),
                        $newFilename
                    );
                
    
                $reclamation->setImage($newFilename);
            }

            $reclamation->setContenu($this->censureMauvaisMots($reclamation->getContenu()));

            $entityManager->persist($reclamation);
            $entityManager->flush();
            return $this->redirectToRoute('app_reclamation');
        }
        return $this->render('reclamation/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    private function censureMauvaisMots($contenu)
    {
        $mauvaisMots = array('stupid', 'un con', 'une bete','mauvais');
        $stars = str_repeat('*', 5);
        return str_ireplace($mauvaisMots, $stars, $contenu);
    }

    #[Route('/reclamationdetail/{id}', name: 'detail_reclamation')]
    public function detail($id,ManagerRegistry $doctrine,EntityManagerInterface $entityManager): Response
    {
        $reclamation =  $doctrine->getRepository(Reclamation::class)->find($id);
  
        return $this->render('reclamation/details.html.twig', [
            'controller_name' => 'ReclamationController',
            'Reclamations'=>$reclamation
        ]);
    }

    #[Route('/modifierRec/{id}', name: 'modifier_Rec')]
    public function modif($id,Request $request, EntityManagerInterface $entityManager,ManagerRegistry $doctrine): Response
    {
        $reclamation =  $doctrine->getRepository(Reclamation::class)->find($id);
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('image')->getData();
        if ($image) {
            $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $newFilename = '/images/attachments/' . $originalFilename . '.' . $extension;
            $image->move(
                $this->getParameter('dossier_images'),
                $newFilename
            );
            $reclamation->setImage($newFilename);
        }

            $reclamation->setContenu($this->censureMauvaisMots($reclamation->getContenu()));
            
            $entityManager->flush();
            return $this->redirectToRoute('app_reclamation');
        }
        return $this->render('reclamation/modifier.html.twig', [
            'form' => $form->createView(),
            
        ]);
    }

    #[Route('/deletereclamation/{id}', name: 'delete_reclamation')]
    public function deleteReclamation($id,ManagerRegistry $doctrine){
        $reclamation=$doctrine->getRepository(Reclamation::class)->find($id);
        $rec=$doctrine->getManager();
        $rec->remove($reclamation);
        $rec->flush();
        return $this->redirectToRoute('app_reclamation');
    }
    #[Route('/search', name: 'search_reclamation')]
    public function search(Request $request, ManagerRegistry $doctrine): Response
    {
         $repo = $doctrine->getRepository(Reclamation::class);
         $query = $request->query->get('query');

        if (!$query) {
        $Reclamations = $repo->findAll();
        } else {
        $Reclamations = $repo->searchByQuery($query);
    }

    return $this->render('reclamation/index.html.twig', [
        'controller_name' => 'ReclamationController',
        'Reclamations'=>$Reclamations
    ]);
}


    #[Route('/reclamationAdmin', name: 'app_reclamationAdmin')]
    public function indexAdmin(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Reclamation::class);
        $Reclamations = $repo->findAll();

        return $this->render('reclamation/consulterAdmin.html.twig', [
            'controller_name' => 'ReclamationController',
            'Reclamations'=>$Reclamations
        ]);
    }
}
