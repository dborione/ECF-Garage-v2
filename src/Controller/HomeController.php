<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ReviewRepository $reviewRepository, CarRepository $carRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'reviews' => $reviewRepository->findLastFive(),
            'cars' => $carRepository->findLastTen(),
        ]);
    }
}
