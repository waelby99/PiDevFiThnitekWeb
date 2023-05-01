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
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Mailer\MailerInterface;
use App\Service\Mailer;
use Symfony\Component\HttpFoundation\RedirectResponse;


class ReclamationController extends AbstractController
{
    #[Route('/reclamation', name: 'app_reclamation')]
    public function index(Request $request,ManagerRegistry $doctrine,ReclamationRepository $reclamationRepository,PaginatorInterface $paginator): Response
    {
        $repo = $doctrine->getRepository(Reclamation::class);
        $Reclamations = $repo->findAll();
        $nombreReclamations = $reclamationRepository->countReclamations();
        $pagination = $paginator->paginate(
            $Reclamations,
            $request->query->getInt('page', 1),
            5,
        );

        return $this->render('reclamation/index.html.twig', [
            'controller_name' => 'ReclamationController',
            'Reclamations'=>$Reclamations,
            'nombreReclamations' => $nombreReclamations,
            'pagination' => $pagination,
        ]);
    }
    #[Route('/addreclamation', name: 'add_reclamation')]
    public function add(Request $request, EntityManagerInterface $entityManager, Mailer $mailer,MailerInterface $mailer1): Response
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
            
            $mailer->sendEmail('niheleeroui124@gmail.com',"niheleeroui124@gmail.com", 'Nouvelle réclamation', 'Une nouvelle réclamation a été ajoutée.',$mailer1);
            
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
    public function search(Request $request, ManagerRegistry $doctrine,ReclamationRepository $reclamationRepository,PaginatorInterface $paginator): Response
    {
         $repo = $doctrine->getRepository(Reclamation::class);
         $query = $request->query->get('query');

        if (!$query) {
        $Reclamations = $repo->findAll();
        } else {
        $Reclamations = $repo->searchByQuery($query);
        $nombreReclamations = $reclamationRepository->countReclamations();
        $pagination = $paginator->paginate(
            $Reclamations,
            $request->query->getInt('page', 1),
            5
        );
    }

    return $this->render('reclamation/index.html.twig', [
        'controller_name' => 'ReclamationController',
        'Reclamations'=>$Reclamations,
        'nombreReclamations' => $nombreReclamations,
        'pagination' => $pagination,
    ]);
   }


    #[Route('/reclamationAdmin', name: 'app_reclamationAdmin')]
    public function indexAdmin(ManagerRegistry $doctrine,ReclamationRepository $reclamationRepository): Response
    {
        $repo = $doctrine->getRepository(Reclamation::class);
        $Reclamations = $repo->findAll();
        $nombreReclamations = $reclamationRepository->countReclamations();

        return $this->render('fixadmin.html.twig', [
            'controller_name' => 'ReclamationController',
            'nombreReclamations' => $nombreReclamations,
            'Reclamations'=>$Reclamations
        ]);
    }

    #[Route('/search1', name: 'search_reclamation1')]
    public function search1(Request $request, ManagerRegistry $doctrine,ReclamationRepository $reclamationRepository,PaginatorInterface $paginator): Response
    {
         $repo = $doctrine->getRepository(Reclamation::class);
         $query = $request->query->get('query');

        if (!$query) {
        $Reclamations = $repo->findAll();
        } else {
        $Reclamations = $repo->searchByQuery($query);
        $nombreReclamations = $reclamationRepository->countReclamations();
        $pagination = $paginator->paginate(
            $Reclamations,
            $request->query->getInt('page', 1),
            5
        );
    }

    return $this->render('fixadmin.html.twig', [
        'controller_name' => 'ReclamationController',
        'Reclamations'=>$Reclamations,
        'nombreReclamations' => $nombreReclamations,
        'pagination' => $pagination,
    ]);
   }

    #[Route('/calender', name: 'app_calender')]
    public function calender(): Response
    {  

        return $this->render('reclamation/calender.html.twig');
    }
    
    

    #[Route('/orderByIntitule', name: 'tri_intitule')]
    public function OrderIntitule(Request $request, ReclamationRepository $reclamationRepository, PaginatorInterface $paginator,ManagerRegistry $doctrine)
   {
    $repo = $doctrine->getRepository(Reclamation::class);
    $Reclamations = $repo->findAll();
    $nombreReclamations = $reclamationRepository->countReclamations();
    $sort = $request->query->get('sort'); 

    $order = ($sort === 'asc') ? 'ASC' : 'DESC';

    $reclamations = $reclamationRepository->findByIntituleAlphabetical($order);

    $pagination = $paginator->paginate(
        $reclamations,
        $request->query->getInt('page', 1),
        5
    );

    return $this->render('reclamation/index.html.twig', [
            'controller_name' => 'ReclamationController',
            'Reclamations'=>$Reclamations,
            'nombreReclamations' => $nombreReclamations,
            'pagination' => $pagination,
    ]);
   }

   #[Route('/orderByIntitule1', name: 'tri_intitule1')]
public function OrderIntituleAdmin(Request $request, ReclamationRepository $reclamationRepository, PaginatorInterface $paginator,ManagerRegistry $doctrine)
{
    $repo = $doctrine->getRepository(Reclamation::class);
    $Reclamations = $repo->findAll();
    $nombreReclamations = $reclamationRepository->countReclamations();
    $sort = $request->query->get('sort');

    $order = ($sort === 'asc') ? 'ASC' : 'DESC';

    $reclamations = $reclamationRepository->findByIntituleAlphabetical($order);

    $pagination = $paginator->paginate(
        $reclamations,
        $request->query->getInt('page', 1),
        5
    );

    return $this->render('fixadmin.html.twig', [
            'controller_name' => 'ReclamationController',
            'Reclamations'=>$Reclamations,
            'nombreReclamations' => $nombreReclamations,
            'pagination' => $pagination,
    ]);
}

    
    
     
}
