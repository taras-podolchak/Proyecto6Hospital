<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Repository\WebApiRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/WebApi')]
class WebApiController extends AbstractController
{
    #[Route('/getEmpleadosWebApi1', name: 'getEmpleadosWebApi1')]
    public function getEmpleadosWebApi1(WebApiRepository $repoWebApi)
    {
        return $this->render('webApi/getEmpleadosWebApi1.html.twig', [
            'datosEmp' =>  $repoWebApi->getEmpleadosWebApi1()
        ]);
    }

    #[Route('/getJugadoresWebApi2', name: 'getJugadoresWebApi2')]
    public function getJugadoresWebApi2(WebApiRepository $repoWebApi)
    {
        $datos = $repoWebApi->getJugadoresWebApi2();

        return $this->render('webApi/getJugadoresWebApi2.html.twig', [
            'datos' =>  $datos['results']
        ]);
    }

    #[Route('/getLibrosWebApi3', name: 'getLibrosWebApi3')]
    public function getLibrosWebApi3(WebApiRepository $repoWebApi)
    {
        $datos = $repoWebApi->getLibrosWebApi3();
        dump($datos);
        return $this->render('webApi/getLibrosWebApi3.html.twig', [
            'datos' =>  $datos['items']
        ]);
    }

    #[Route('/getCentroDeDiaWebApi4', name: 'getCentroDeDiaWebApi4')]
    public function getCentroDeDiaWebApi4(WebApiRepository $repoWebApi)
    {
        $datos = $repoWebApi->getCentroDeDiaWebApi4();
        dump($datos['@graph']);
        return $this->render('webApi/getCentroDeDiaWebApi4.html.twig', [
            'datos' =>  $datos['@graph']
        ]);
    }

    #[Route('/getPeliculasWebApi5', name: 'getPeliculasWebApi5')]
    public function getPeliculasWebApi5(WebApiRepository $repoWebApi)
    {
        $datos = $repoWebApi->getPeliculasWebApi5();
        return $this->render('webApi/getPeliculasWebApi5.html.twig', [
            'titulo' =>  "",
            'datos' =>  $datos

        ]);
    }

    #[Route('/getPeliculaWebApi5', name: 'getPeliculaWebApi5')]
    public function getPeliculaWebApi5(Request $request, WebApiRepository $repoWebApi)
    {
        $titulo = $request->request->get('txtBuscarPelicula');
        dump($titulo);
        if ($titulo == "") {
            return $this->redirectToRoute('getPeliculasWebApi5');
        }
        $datos = $repoWebApi->getPeliculaWebApi5($titulo);
        dump($datos);
        return $this->render('webApi/getPeliculasWebApi5.html.twig', [
            'titulo' =>  $titulo,
            'datos' =>  $datos
        ]);
    }

    //el otro proyecto que tengo Symfony "proyectoWebApi"
    #[Route('/getPersonasWebApi6', name: 'getPersonasWebApi6')]
    public function getPersonasWebApi6(WebApiRepository $repoWebApi)
    {

        return $this->render('webApi/getPersonasWebApi6.html.twig', [
            'datosPrograma' => $repoWebApi->getPersonasWebApi6()
        ]);
    }

    //el otro proyecto que tengo Symfony "proyectoWebApi"
    #[Route('/getEmpApiWeb7', name: 'getEmpApiWeb7')]
    public function getEmpApiWeb7(WebApiRepository $repoWebApi)
    {

        return $this->render('webApi/getEmpApiWeb7.html.twig', [
            'epms' => $repoWebApi->getEmpApiWeb7()
        ]);
    }

    //el otro proyecto que tengo .NET "WebApi"
    #[Route('/getPersonaApiWebNET8', name: 'getPersonaApiWebNET8')]
    public function getPersonaApiWebNET8(WebApiRepository $repoWebApi)
    {

        return $this->render('webApi/getPersonaApiWebNET8.html.twig', [
            'epms' => $repoWebApi->getPersonaApiWebNET8()
        ]);
    }

    //el otro proyecto que tengo .NET "WebApi"
    #[Route('/getPersonasApiWebNET9', name: 'getPersonasApiWebNET9')]
    public function getPersonasApiWebNET9(WebApiRepository $repoWebApi)
    {

        return $this->render('webApi/getPersonasApiWebNET9.html.twig', [
            'pers' => $repoWebApi->getPersonasApiWebNET9()
        ]);
    }

    //el otro proyecto que tengo .NET "WebApi"
    #[Route('/getPersonaWebApi9', name: 'getPersonaWebApi9')]
    public function getPersonaWebApi9(Request $request, WebApiRepository $repoWebApi)
    {
        if ($request->request->get('txtBuscarPersonaNombre')) {
            return $this->render('webApi/getPersonasApiWebNET9.html.twig', [
                'per' => $repoWebApi->getPersonaWebApi9BuscarPersonaNombre($request->request->get('txtBuscarPersonaNombre'))
            ]);
        }
        if ($request->request->get('txtBuscarPersonaDescripcion')) {
            return $this->render('webApi/getPersonasApiWebNET9.html.twig', [
                'pers' => $repoWebApi->getPersonaWebApi9BuscarPersonaDescripcion($request->request->get('txtBuscarPersonaDescripcion'))
            ]);
        }
    }
}
