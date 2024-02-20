<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CarRepository;
use App\Entity\ContactMessage;
use App\Form\ContactMessageType;
use Doctrine\ORM\EntityManagerInterface;

class CarsController extends AbstractController
{
    #[Route('/cars', name: 'app_cars')]
    public function index(CarRepository $carRepository): Response
    {
        return $this->render('cars/index.html.twig', [
            'cars' => $carRepository->findAll(),
            'highest_km' => $carRepository->highestKm(),
            'lowest_km' => $carRepository->lowestKm(),
        ]);
    }

    #[Route('/cars/{slug}', name: 'app_cars_slug')]
    public function seeCar(Request $request, EntityManagerInterface $entityManager, CarRepository $carRepository, string $slug): Response
    {
        $contactMessage = new ContactMessage();

        $form = $this->createForm(ContactMessageType::class, $contactMessage);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactMessage = new ContactMessage();

            $contactMessage = $form->getData();
            
            $entityManager->persist($contactMessage);
            $entityManager->flush();

            return $this->redirectToRoute('app_cars_slug', ['slug'=>$slug]);
        }

        return $this->render('cars/single_car.html.twig', [
            'cars' => $carRepository->findBy(['slug'=>$slug]),
            'contactForm' => $form,
        ]);
    }
}
