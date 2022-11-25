<?php

namespace App\Controller;

use App\Entity\Enfermo;
use App\Form\EnfermoType;
use App\Repository\EnfermoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/enfermo')]
class EnfermoController extends AbstractController
{/*
    #[Route('/', name: 'app_enfermo_index', methods: ['GET'])]
    public function index(EnfermoRepository $enfermoRepository): Response
    {
        return $this->render('enfermo/index.html.twig', [
            'enfermos' => $enfermoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_enfermo_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EnfermoRepository $enfermoRepository): Response
    {
        $enfermo = new Enfermo();
        $form = $this->createForm(EnfermoType::class, $enfermo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $enfermoRepository->add($enfermo, true);

            return $this->redirectToRoute('app_enfermo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('enfermo/new.html.twig', [
            'enfermo' => $enfermo,
            'form' => $form,
        ]);
    }

    #[Route('/{inscripcion}', name: 'app_enfermo_show', methods: ['GET'])]
    public function show(Enfermo $enfermo): Response
    {
        return $this->render('enfermo/show.html.twig', [
            'enfermo' => $enfermo,
        ]);
    }

    #[Route('/{inscripcion}/edit', name: 'app_enfermo_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Enfermo $enfermo, EnfermoRepository $enfermoRepository): Response
    {
        $form = $this->createForm(EnfermoType::class, $enfermo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $enfermoRepository->add($enfermo, true);

            return $this->redirectToRoute('app_enfermo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('enfermo/edit.html.twig', [
            'enfermo' => $enfermo,
            'form' => $form,
        ]);
    }

    #[Route('/{inscripcion}', name: 'app_enfermo_delete', methods: ['POST'])]
    public function delete(Request $request, Enfermo $enfermo, EnfermoRepository $enfermoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$enfermo->getInscripcion(), $request->request->get('_token'))) {
            $enfermoRepository->remove($enfermo, true);
        }

        return $this->redirectToRoute('app_enfermo_index', [], Response::HTTP_SEE_OTHER);
    }

    /*********************** */


    #[Route('/inicio', name: 'enfermoInicio')]
    public function verPagina()
    {
        return $this->render('enfermo_/Inicio.html.twig');
    }

    #[Route('/enfermoPagina2', name: 'enfermoPagina2')]
    public function enfermoPagina2(Request $request, EnfermoRepository $repoEnfermo)
    {
        $session = $request->getSession();

        $NSS = $request->request->get('numNSS');

        if (mb_strlen($NSS) == 9) {

            if (!$repoEnfermo->findByNss($NSS)) {
                $session->set('NSS', $NSS);
                return $this->render('enfermo_/enfermoPagina2.html.twig');

            } else {

                return $this->render('enfermo_/Inicio.html.twig', [
                    'alerta' => "El NSS ya existe en la base"
                ]);
            }
        } else {

            return $this->render('enfermo_/Inicio.html.twig', [
                'alerta' => "La longitud del NSS incorrecto (debe de ser de 9 car.)"
            ]);
        }
    }

    #[Route('/enfermoPagina3', name: 'enfermoPagina3')]
    public function enfermoPagina3(Request $request, EnfermoRepository $repoEnfermo)
    {
        $enfermo = new Enfermo();

        $enfermo->setNss($request->getSession()->get('NSS'));
        $enfermo->setApellido($request->request->get('txtApellido'));
        $enfermo->setDireccion($request->request->get('txtDireccion'));
        $enfermo->setFechaNac(new \DateTime('@' . strtotime($request->request->get('txtDate'))));
        $enfermo->setSexo($request->request->get('txtSexo'));
        $repoEnfermo->crearEnfermo($enfermo);

        return $this->render('enfermo_/Inicio.html.twig', [
            'enfermos' => $repoEnfermo->findAll(),
        ]);
    }
}
