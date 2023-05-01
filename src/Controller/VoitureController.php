<?php

namespace App\Controller;

use App\Entity\Sponsoring;
use App\Entity\Voiture;
use App\Entity\User;
use App\Form\VoitureType;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Component\Pager\Pagination\SlidingPagination;

#[Route('/voiture')]
class VoitureController extends AbstractController


{
    #[Route('/', name: 'app_voiture_index', methods: ['GET'])]
    public function index(VoitureRepository $voitureRepository): Response
    {
        return $this->render('voiture/index.html.twig', [
            'voitures' => $voitureRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_voiture_new', methods: ['GET', 'POST'])]
    public function new(Request $request, VoitureRepository $voitureRepository): Response
    {

        $voiture = new Voiture();
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $voitureRepository->save($voiture, true);

            return $this->redirectToRoute('app_voiture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('voiture/new.html.twig', [
            'voiture' => $voiture,
            'form' => $form,
        ]);
    }




    #[Route('/pdf', name: 'app_voiture_pdf', methods: ['GET'])]
    public function generatePdf(VoitureRepository $voitureRepository): Response
    {
        $voitures = $voitureRepository->findAll();

        // Configuration de Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        // Récupération du contenu du template HTML
        $html = $this->renderView('voiture/pdf.html.twig', [
            'voitures' => $voitures
        ]);

        // Génération du PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Envoi du PDF en réponse HTTP
        $response = new Response($dompdf->output());
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-Disposition', 'inline; filename="liste_voitures.pdf"');

        return $response;
    }

    #[Route('/{id}', name: 'app_voiture_show')]
    public function show($id,ManagerRegistry $doctrine,EntityManagerInterface $entityManager): Response
    {

         $id= $doctrine->getRepository(Voiture::class)->find($id);
        return $this->render('voiture/show.html.twig', [
            'controller_name' => 'VoitureContoroller',
            'voiture' => $id,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_voiture_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Voiture $voiture, VoitureRepository $voitureRepository): Response
    {
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $voitureRepository->save($voiture, true);

            return $this->redirectToRoute('app_voiture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('voiture/edit.html.twig', [
            'voiture' => $voiture,
            'form' => $form,
        ]);
    }

    #[Route('deleteVoiture/{id}', name: 'app_voiture_delete')]
    public function delete($id,ManagerRegistry $doctrine): Response
    {
        $voiture= $doctrine->getRepository(Voiture::class)->find($id);
        $em=$doctrine->getManager();
        $em->remove($voiture);
        $em->flush();
        return $this->redirectToRoute('app_voiture_index');


    }


}
