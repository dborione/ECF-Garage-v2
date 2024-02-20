<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CarRepository;

class CarsController extends AbstractController
{
    #[Route('/cars', name: 'app_cars')]
    public function index(CarRepository $carRepository): Response
    {
        return $this->render('cars/index.html.twig', [
            'cars' => $carRepository->findAll(),
        ]);
    }

    #[Route('/cars/{slug}', name: 'app_cars_slug', methods: ['GET'])]
    public function seeCar(CarRepository $carRepository, string $slug): Response
    {
        // dd($slug);
        return $this->render('cars/single_car.html.twig', [
            'car' => $carRepository->findOneBySomeField($slug),
            // 'car' => $carRepository->findAll(),
        ]);
    }
}
