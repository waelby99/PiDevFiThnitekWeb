<?php

namespace App\Controller;
use App\Entity\Questions;
use App\Entity\Sondage;
use App\Form\QuestionsType;
use App\Repository\QuestionsRepository;
use App\Repository\SondageRepository;
use App\Repository\ReponsesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;



#[Route('/questions')]
class QuestionsController extends AbstractController
{
    #[Route('/', name: 'app_questions_index', methods: ['GET'])]
    public function index(QuestionsRepository $questionsRepository): Response
    {
        return $this->render('questions/index.html.twig', [
            'questions' => $questionsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_questions_new', methods: ['GET', 'POST'])]
    public function new(Request $request, QuestionsRepository $questionsRepository): Response
    {
        $question = new Questions();
        $form = $this->createForm(QuestionsType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionsRepository->save($question, true);

            return $this->redirectToRoute('app_questions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('questions/new.html.twig', [
            'question' => $question,
            'form' => $form,
        ]);
    }

    #[Route('/{questionId}', name: 'app_questions_show', methods: ['GET'])]
    public function show(Questions $question): Response
    {
        return $this->render('questions/show.html.twig', [
            'question' => $question,
        ]);
    }

    #[Route('/{questionId}/edit', name: 'app_questions_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Questions $question, QuestionsRepository $questionsRepository): Response
    {
        $form = $this->createForm(QuestionsType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionsRepository->save($question, true);

            return $this->redirectToRoute('app_questions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('questions/edit.html.twig', [
            'question' => $question,
            'form' => $form,
        ]);
    }
      
    #[Route('/display/{sondageId}', name: 'app_sondage_display')]
    public function listQuestion(QuestionsRepository $repo, $sondageId): Response
    {

       $questions = $repo->findById($sondageId);

        
        return $this->render('questions/index.html.twig', [
            'questions' => $questions,
            
        ]);
    }

    #[Route('/{questionId}', name: 'app_questions_delete', methods: ['POST'])]
    public function delete(Request $request, Questions $question, QuestionsRepository $questionsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$question->getQuestionId(), $request->request->get('_token'))) {
            $questionsRepository->remove($question, true);
        }

        return $this->redirectToRoute('app_questions_index', [], Response::HTTP_SEE_OTHER);
    }
    






}


