<?php

namespace App\Controller;

use App\Entity\Offrecovoiturage;
use App\Form\OffrecovoiturageType;
use App\Repository\OffrecovoiturageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/offrecovoiturage')]
class OffrecovoiturageController extends AbstractController
{
    #[Route('/', name: 'app_offrecovoiturage_index', methods: ['GET'])]
    public function index(OffrecovoiturageRepository $offrecovoiturageRepository): Response
    {
        return $this->render('offrecovoiturage/index.html.twig', [
            'offres' => $offrecovoiturageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_offrecovoiturage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OffrecovoiturageRepository $offrecovoiturageRepository): Response
    {
        $offrecovoiturage = new Offrecovoiturage();
        $form = $this->createForm(OffrecovoiturageType::class, $offrecovoiturage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offrecovoiturageRepository->save($offrecovoiturage, true);

            return $this->redirectToRoute('app_offrecovoiturage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offrecovoiturage/new.html.twig', [
            'offrecovoiturage' => $offrecovoiturage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_offrecovoiturage_show', methods: ['GET'])]
    public function show(Offrecovoiturage $offrecovoiturage): Response
    {
        return $this->render('offrecovoiturage/show.html.twig', [
            'offrecovoiturage' => $offrecovoiturage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_offrecovoiturage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Offrecovoiturage $offrecovoiturage, OffrecovoiturageRepository $offrecovoiturageRepository): Response
    {
        $form = $this->createForm(OffrecovoiturageType::class, $offrecovoiturage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offrecovoiturageRepository->save($offrecovoiturage, true);

            return $this->redirectToRoute('app_offrecovoiturage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offrecovoiturage/edit.html.twig', [
            'offrecovoiturage' => $offrecovoiturage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_offrecovoiturage_delete', methods: ['POST'])]
    public function delete(Request $request, Offrecovoiturage $offrecovoiturage, OffrecovoiturageRepository $offrecovoiturageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offrecovoiturage->getId(), $request->request->get('_token'))) {
            $offrecovoiturageRepository->remove($offrecovoiturage, true);
        }

        return $this->redirectToRoute('app_offrecovoiturage_index', [], Response::HTTP_SEE_OTHER);
    }
}
