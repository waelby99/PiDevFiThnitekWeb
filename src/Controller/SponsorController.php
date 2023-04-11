<?php

namespace App\Controller;


use App\Entity\Sponsoring;
use App\Form\SponsorType;
use App\Repository\SponsoringRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SponsorController extends AbstractController
{
    #[Route('/sponsor', name: 'app_sponsor')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $sponsors = $doctrine->getRepository(Sponsoring::class)->findAll();

        return $this->render('sponsor/index.html.twig', [
            'controller_name' => 'SponsorController',
            'sponsors'=>$sponsors
        ]);
    }
    #[Route('/deletesponsor/{id}', name: 'delete_sponsor')]
    public function deleteSponsor($id,ManagerRegistry $doctrine){
        $sponsor=$doctrine->getRepository(Sponsoring::class)->find($id);
        $em=$doctrine->getManager();
        $em->remove($sponsor);
        $em->flush();
        return $this->redirectToRoute('app_sponsor');
    }
    #[Route('/addsponsor', name: 'add_sponsor')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sponsor = new Sponsoring();
        $form = $this->createForm(SponsorType::class, $sponsor);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($sponsor);
            $entityManager->flush();
            return $this->redirectToRoute('app_sponsor');
        }
        return $this->render('sponsor/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/modifSponsor/{id}', name: 'modif_sponsor')]
    public function modif($id,Request $request, EntityManagerInterface $entityManager,ManagerRegistry $doctrine): Response
    {
        $sponsor =  $doctrine->getRepository(Sponsoring::class)->find($id);
        $form = $this->createForm(SponsorType::class, $sponsor);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
            return $this->redirectToRoute('app_sponsor');
        }
        return $this->render('sponsor/modifier.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/sponsordetail/{id}', name: 'detail_sponsor')]
    public function detail($id,ManagerRegistry $doctrine,EntityManagerInterface $entityManager): Response
    {
        $sponsor =  $doctrine->getRepository(Sponsoring::class)->find($id);
        $evenments = $doctrine->getRepository(Sponsoring::class)->getEvenementBySponsorId($entityManager, $id);
        return $this->render('sponsor/details.html.twig', [
            'controller_name' => 'SponsorController',
            'sponsor'=>$sponsor,
            'events'=>$evenments
        ]);
    }

    #[Route('/searchSponsorx', name:'searchSponsor')]
    public function searchSponsor(Request $request,ManagerRegistry $doctrine,NormalizerInterface $Normalizer,SponsoringRepository $sr)
    {

        $requestString=$request->get('searchValue');
        $sponsorings=$sr->getSponsorbyNom($requestString);
        $jsonContent = $Normalizer->normalize($sponsorings,'json',['groups'=>'sponsorings']);
        $retour=json_encode($jsonContent);
        return new Response($retour);
    }
}
