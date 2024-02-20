<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ReviewRepository;
use App\Repository\CarRepository;
use App\Repository\ServiceRepository;
use App\Entity\ContactMessage;
use App\Form\ContactMessageType;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    // public function contact(Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $contactMessage = new ContactMessage();

    //     $form = $this->createForm(ContactMessageType::class, $contactMessage);

    //     $form->handleRequest($request);
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $contactMessage = new ContactMessage();

    //         contactMessage->$form->getData();
            
    //         $entityManager->persist($contactMessage);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_contact_message');
    //     }

    //     return $this->render('contact_message/index.html.twig', [
    //         'contactForm' => $form,
    //     ]);
    // }

    #[Route('/home', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $entityManager, ReviewRepository $reviewRepository, CarRepository $carRepository, ServiceRepository $serviceRepository): Response
    {
        $contactMessage = new ContactMessage();

        $form = $this->createForm(ContactMessageType::class, $contactMessage);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactMessage = new ContactMessage();

            $contactMessage = $form->getData();
            
            $entityManager->persist($contactMessage);
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('home/index.html.twig', [
            'reviews' => $reviewRepository->findLastFive(),
            'cars' => $carRepository->findLastTen(),
            'services' => $serviceRepository->findAll(),
            'contactForm' => $form,
        ]);
    }
}
