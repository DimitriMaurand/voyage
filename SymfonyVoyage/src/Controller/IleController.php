<?php

namespace App\Controller;

use App\Entity\Ile;
use App\Form\IleType;
use App\Repository\IleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/ile')]
class IleController extends AbstractController
{
    #[IsGranted('ROLE_USER', message: "Tu n'as rien à faire là.")]
    #[Route('/', name: 'app_ile_index', methods: ['GET'])]
    public function index(IleRepository $ileRepository): Response
    {
        return $this->render('ile/index.html.twig', [
            'iles' => $ileRepository->findAll(),
        ]);
    }

    #[IsGranted('ROLE_USER', message: "Tu n'as rien à faire là.")]
    #[Route('/new', name: 'app_ile_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ile = new Ile();
        $form = $this->createForm(IleType::class, $ile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ile);
            $entityManager->flush();

            return $this->redirectToRoute('app_ile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ile/new.html.twig', [
            'ile' => $ile,
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_USER', message: "Tu n'as rien à faire là.")]
    #[Route('/{id}', name: 'app_ile_show', methods: ['GET'])]
    public function show(Ile $ile): Response
    {
        return $this->render('ile/show.html.twig', [
            'ile' => $ile,
        ]);
    }

    #[IsGranted('ROLE_USER', message: "Tu n'as rien à faire là.")]
    #[Route('/{id}/edit', name: 'app_ile_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ile $ile, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(IleType::class, $ile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ile/edit.html.twig', [
            'ile' => $ile,
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_USER', message: "Tu n'as rien à faire là.")]
    #[Route('/{id}', name: 'app_ile_delete', methods: ['POST'])]
    public function delete(Request $request, Ile $ile, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $ile->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($ile);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ile_index', [], Response::HTTP_SEE_OTHER);
    }
}
