<?php

namespace App\Controller;

use App\Entity\Locatie;
use App\Form\LocatieType;
use App\Repository\LocatieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

#[Route('/')]
class LocatieController extends AbstractController
{
    #[Route('/', name: 'app_locatie_index', methods: ['GET'])]
    public function index(LocatieRepository $locatieRepository): Response
    {
        return $this->render('locatie/index.html.twig', [
            'locaties' => $locatieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_locatie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LocatieRepository $locatieRepository): Response
    {
        $locatie = new Locatie();
        $form = $this->createForm(LocatieType::class, $locatie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $locatieRepository->add($locatie);
            return $this->redirectToRoute('app_locatie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('locatie/new.html.twig', [
            'locatie' => $locatie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_locatie_show', methods: ['GET'])]
    public function show(Locatie $locatie): Response
    {
        return $this->render('locatie/show.html.twig', [
            'locatie' => $locatie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_locatie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Locatie $locatie, LocatieRepository $locatieRepository): Response
    {
        $form = $this->createForm(LocatieType::class, $locatie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $locatieRepository->add($locatie);
            return $this->redirectToRoute('app_locatie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('locatie/edit.html.twig', [
            'locatie' => $locatie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_locatie_delete', methods: ['POST'])]
    public function delete(Request $request, Locatie $locatie, LocatieRepository $locatieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$locatie->getId(), $request->request->get('_token'))) {
            $locatieRepository->remove($locatie);
        }

        return $this->redirectToRoute('app_locatie_index', [], Response::HTTP_SEE_OTHER);
    }
}
