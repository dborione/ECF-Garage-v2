<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ReviewRepository;
use App\Repository\CarRepository;
use App\Repository\ServiceRepository;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ReviewRepository $reviewRepository, CarRepository $carRepository, ServiceRepository $serviceRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'reviews' => $reviewRepository->findLastFive(),
            'cars' => $carRepository->findLastTen(),
            'services' => $serviceRepository->findAll(),
        ]);
    }
}
