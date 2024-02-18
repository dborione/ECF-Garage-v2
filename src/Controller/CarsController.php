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
}
