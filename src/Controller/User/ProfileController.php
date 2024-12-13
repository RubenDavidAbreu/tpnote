<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

#[Route('/profile')]
class ProfileController extends AbstractController
{
    #[Route('/', name: 'user_profile_show', methods: ['GET'])]
    public function show(UserInterface $user): Response
    {
        return $this->render('user/profile/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/edit', name: 'user_profile_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, UserInterface $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('user_profile_show');
        }

        return $this->render('user/profile/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/reservations', name: 'user_profile_reservations', methods: ['GET'])]
    public function reservations(UserInterface $user, ReservationRepository $reservationRepository): Response
    {
        return $this->render('user/profile/reservations.html.twig', [
            'reservations' => $reservationRepository->findBy(['user' => $user]),
        ]);
    }
}
