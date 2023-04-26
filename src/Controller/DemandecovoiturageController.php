<?php

namespace App\Controller;

use App\Entity\Demandecovoiturage;
use App\Form\DemandecovoiturageType;
use App\Repository\DemandecovoiturageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/demandecovoiturage')]
class DemandecovoiturageController extends AbstractController
{
    #[Route('/', name: 'app_demandecovoiturage_index', methods: ['GET'])]
    public function index(DemandecovoiturageRepository $demandecovoiturageRepository): Response
    {
        return $this->render('demandecovoiturage/index.html.twig', [
            'demandecovoiturages' => $demandecovoiturageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_demandecovoiturage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DemandecovoiturageRepository $demandecovoiturageRepository): Response
    {
        $demandecovoiturage = new Demandecovoiturage();
        $form = $this->createForm(DemandecovoiturageType::class, $demandecovoiturage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demandecovoiturageRepository->save($demandecovoiturage, true);

            return $this->redirectToRoute('app_demandecovoiturage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demandecovoiturage/new.html.twig', [
            'demandecovoiturage' => $demandecovoiturage,
            'form' => $form,
        ]);
    }

    public function listOffre(DemandecovoiturageRepository $repo, $idOffre): Response
    {

       $questions = $repo->findById($idOffre);

        
        return $this->render('Demandecovoiturage/index.html.twig', [
            'Demandecovoiturage' => $Demandecovoiturage,
            
        ]);
    }

    #[Route('/{id}', name: 'app_demandecovoiturage_show', methods: ['GET'])]
    public function show(Demandecovoiturage $demandecovoiturage): Response
    {
        return $this->render('demandecovoiturage/show.html.twig', [
            'demandecovoiturage' => $demandecovoiturage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_demandecovoiturage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Demandecovoiturage $demandecovoiturage, DemandecovoiturageRepository $demandecovoiturageRepository): Response
    {
        $form = $this->createForm(DemandecovoiturageType::class, $demandecovoiturage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demandecovoiturageRepository->save($demandecovoiturage, true);

            return $this->redirectToRoute('app_demandecovoiturage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demandecovoiturage/edit.html.twig', [
            'demandecovoiturage' => $demandecovoiturage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_demandecovoiturage_delete', methods: ['POST'])]
    public function delete(Request $request, Demandecovoiturage $demandecovoiturage, DemandecovoiturageRepository $demandecovoiturageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demandecovoiturage->getId(), $request->request->get('_token'))) {
            $demandecovoiturageRepository->remove($demandecovoiturage, true);
        }

        return $this->redirectToRoute('app_demandecovoiturage_index', [], Response::HTTP_SEE_OTHER);
    }
}
