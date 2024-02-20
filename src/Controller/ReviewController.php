<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Review;
use App\Form\ReviewType;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

class ReviewController extends AbstractController
{
    #[Route('/review', name: 'app_review')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $review = new Review();

        $form = $this->createForm(ReviewType::class, $review);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $review = new Review();

            $review->setName($form->get('name')->getData());
            $review->setNote($form->get('note')->getData());
            $review->setBody($form->get('body')->getData());
            $review->setStatus('pending');
            
            $entityManager->persist($review);
            $entityManager->flush();

            return $this->redirectToRoute('app_review');
        }

        return $this->render('review/index.html.twig', [
            'reviewForm' => $form,
        ]);
    }
}
