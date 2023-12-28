<?php

namespace App\Controller;

use App\Entity\Paiments;
use App\Form\PaimentsType;
use App\Repository\PaimentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/paiments')]
class PaimentsController extends AbstractController
{
    #[Route('/', name: 'app_paiments_index', methods: ['GET'])]
    public function index(PaimentsRepository $paimentsRepository): Response
    {
        return $this->render('paiments/index.html.twig', [
            'paiments' => $paimentsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_paiments_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $paiment = new Paiments();
        $form = $this->createForm(PaimentsType::class, $paiment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($paiment);
            $entityManager->flush();

            return $this->redirectToRoute('app_paiments_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('paiments/new.html.twig', [
            'paiment' => $paiment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_paiments_show', methods: ['GET'])]
    public function show(Paiments $paiment): Response
    {
        return $this->render('paiments/show.html.twig', [
            'paiment' => $paiment,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_paiments_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Paiments $paiment, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PaimentsType::class, $paiment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_paiments_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('paiments/edit.html.twig', [
            'paiment' => $paiment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_paiments_delete', methods: ['POST'])]
    public function delete(Request $request, Paiments $paiment, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paiment->getId(), $request->request->get('_token'))) {
            $entityManager->remove($paiment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_paiments_index', [], Response::HTTP_SEE_OTHER);
    }
}
