<?php

namespace App\Controller;

use App\Entity\Peliculas;
use App\Form\PeliculasType;
use App\Repository\GenerosRepository;
use App\Repository\PeliculasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/peliculas')]
class PeliculasController extends AbstractController
{/*
    #[Route('/', name: 'app_peliculas_index', methods: ['GET'])]
    public function index(PeliculasRepository $peliculasRepository): Response
    {
        return $this->render('peliculas/index.html.twig', [
            'peliculas' => $peliculasRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_peliculas_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PeliculasRepository $peliculasRepository): Response
    {
        $pelicula = new Peliculas();
        $form = $this->createForm(PeliculasType::class, $pelicula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $peliculasRepository->add($pelicula, true);

            return $this->redirectToRoute('app_peliculas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('peliculas/new.html.twig', [
            'pelicula' => $pelicula,
            'form' => $form,
        ]);
    }

    #[Route('/{idpelicula}', name: 'app_peliculas_show', methods: ['GET'])]
    public function show(Peliculas $pelicula): Response
    {
        return $this->render('peliculas/show.html.twig', [
            'pelicula' => $pelicula,
        ]);
    }

    #[Route('/{idpelicula}/edit', name: 'app_peliculas_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Peliculas $pelicula, PeliculasRepository $peliculasRepository): Response
    {
        $form = $this->createForm(PeliculasType::class, $pelicula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $peliculasRepository->add($pelicula, true);

            return $this->redirectToRoute('app_peliculas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('peliculas/edit.html.twig', [
            'pelicula' => $pelicula,
            'form' => $form,
        ]);
    }

    #[Route('/{idpelicula}', name: 'app_peliculas_delete', methods: ['POST'])]
    public function delete(Request $request, Peliculas $pelicula, PeliculasRepository $peliculasRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pelicula->getIdpelicula(), $request->request->get('_token'))) {
            $peliculasRepository->remove($pelicula, true);
        }

        return $this->redirectToRoute('app_peliculas_index', [], Response::HTTP_SEE_OTHER);
    }
    /**************** */
    #[Route('/homePeliculas', name: 'homePeliculas')]
    public function index(Request $request, PeliculasRepository $repoPeliculas, GenerosRepository $repoGeneros): Response
    {
        $botonIdGenero = $request->request->get('botonGenero');
        $boton = $request->request->get('boton');

        if ($botonIdGenero != null) {
            return $this->render('peliculas_/indexPeliculas.html.twig', [
                'generos' => $repoGeneros->findAll(),
                'peliculas' => $repoPeliculas->findByidgenero($botonIdGenero),
            ]);
        }

        if ($boton == "Comprar") {
            $session = $request->getSession();

            $arrIds = $session->get('arr');
            foreach ($request->request->all("check") as $value) {
                $arrIds[] = $value;
            }
            $session->set('arr', $arrIds);

            return $this->render('peliculas_/indexPeliculas.html.twig', [
                'generos' => $repoGeneros->findAll(),
                'peliculas' => $repoPeliculas->findAll(),
            ]);
        }

        if ($boton == "Ver carrito") {
            $session = $request->getSession();
            $precio=0;
            $arrPeliculas=[];

            foreach ($session->get('arr')  as $id) {
                if ($id != 0) {
                    $pelicula = $repoPeliculas->getPeliculaFromId($id);
                    $precio += $pelicula->getPrecio();
                    $arrPeliculas[] = $pelicula;
                }
            }

            return $this->render('peliculas_/indexPeliculas.html.twig', [
                'generos' => $repoGeneros->findAll(),
                'carritos' => $arrPeliculas,
                'precio' => $precio
            ]);
        }


        return $this->render('peliculas_/indexPeliculas.html.twig', [
            'generos' => $repoGeneros->findAll(),
            'peliculas' => $repoPeliculas->findAll(),

        ]);
    }

    #[Route('/methodLimpiarPeliculas', name: 'methodLimpiarPeliculas')]
    public function methodLimpiarPeliculas(Request $request)
    {
        $session = $request->getSession();
        $session->clear();
        return $this->redirectToRoute('homePeliculas');
    }
}
