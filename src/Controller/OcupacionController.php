<?php

namespace App\Controller;

use App\Entity\Ocupacion;
use App\Form\OcupacionType;
use App\Repository\OcupacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ocupacion')]
class OcupacionController extends AbstractController
{
    #[Route('/', name: 'app_ocupacion_index', methods: ['GET'])]
    public function index(OcupacionRepository $ocupacionRepository): Response
    {
        return $this->render('ocupacion/index.html.twig', [
            'ocupacions' => $ocupacionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ocupacion_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OcupacionRepository $ocupacionRepository): Response
    {
        $ocupacion = new Ocupacion();
        $form = $this->createForm(OcupacionType::class, $ocupacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocupacionRepository->add($ocupacion, true);

            return $this->redirectToRoute('app_ocupacion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ocupacion/new.html.twig', [
            'ocupacion' => $ocupacion,
            'form' => $form,
        ]);
    }

    #[Route('/{inscripcion}', name: 'app_ocupacion_show', methods: ['GET'])]
    public function show(Ocupacion $ocupacion): Response
    {
        return $this->render('ocupacion/show.html.twig', [
            'ocupacion' => $ocupacion,
        ]);
    }

    #[Route('/{inscripcion}/edit', name: 'app_ocupacion_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ocupacion $ocupacion, OcupacionRepository $ocupacionRepository): Response
    {
        $form = $this->createForm(OcupacionType::class, $ocupacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocupacionRepository->add($ocupacion, true);

            return $this->redirectToRoute('app_ocupacion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ocupacion/edit.html.twig', [
            'ocupacion' => $ocupacion,
            'form' => $form,
        ]);
    }

    #[Route('/{inscripcion}', name: 'app_ocupacion_delete', methods: ['POST'])]
    public function delete(Request $request, Ocupacion $ocupacion, OcupacionRepository $ocupacionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ocupacion->getInscripcion(), $request->request->get('_token'))) {
            $ocupacionRepository->remove($ocupacion, true);
        }

        return $this->redirectToRoute('app_ocupacion_index', [], Response::HTTP_SEE_OTHER);
    }
}
