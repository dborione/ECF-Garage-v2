<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\ContactMessage;
use App\Form\ContactMessageType;
use Doctrine\ORM\EntityManagerInterface;

class ContactMessageController extends AbstractController
{
    #[Route('/contact/message', name: 'app_contact_message')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contactMessage = new ContactMessage();

        $form = $this->createForm(ContactMessageType::class, $contactMessage);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactMessage = new ContactMessage();

            $contactMessage = $form->getData();
            
            $entityManager->persist($contactMessage);
            $entityManager->flush();

            return $this->redirectToRoute('app_contact_message');
        }

        return $this->render('contact_message/index.html.twig', [
            'contactForm' => $form,
        ]);
    }
}
