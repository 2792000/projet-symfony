<?php

namespace App\Controller;

use App\Entity\Enchainements;
use App\Form\EnchainementsType;
use App\Repository\EnchainementsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/enchainements')]
class EnchainementsController extends AbstractController
{
    #[Route('/', name: 'app_enchainements_index', methods: ['GET'])]
    public function index(EnchainementsRepository $enchainementsRepository): Response
    {
        return $this->render('enchainements/index.html.twig', [
            'enchainements' => $enchainementsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_enchainements_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $enchainement = new Enchainements();
        $form = $this->createForm(EnchainementsType::class, $enchainement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($enchainement);
            $entityManager->flush();

            return $this->redirectToRoute('app_enchainements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('enchainements/new.html.twig', [
            'enchainement' => $enchainement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_enchainements_show', methods: ['GET'])]
    public function show(Enchainements $enchainement): Response
    {
        return $this->render('enchainements/show.html.twig', [
            'enchainement' => $enchainement,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_enchainements_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Enchainements $enchainement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EnchainementsType::class, $enchainement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_enchainements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('enchainements/edit.html.twig', [
            'enchainement' => $enchainement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_enchainements_delete', methods: ['POST'])]
    public function delete(Request $request, Enchainements $enchainement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$enchainement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($enchainement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_enchainements_index', [], Response::HTTP_SEE_OTHER);
    }
}
