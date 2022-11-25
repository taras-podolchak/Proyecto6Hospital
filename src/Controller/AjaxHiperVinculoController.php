<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

#[Route('/AjaxHiperVinculo')]
class AjaxHiperVinculoController extends AbstractController
{

    #[Route('/IndexHiperVinculo', name: 'inicioHiperVinculo')]
    public function inicioHiperVinculo()
    {
        return $this->render('ajaxHiperVinculos/IndexHiperVinculos.html.twig');
    }

    #[Route('/RecuperarGet', name: 'Recuperar')]
    public function personas(Request $request)
    {
        $datoget = $request->query->get('id');
        $datoget2 = $request->query->get('nombre');

        return $this->render('ajaxHiperVinculos/verdatos.html.twig', [
            'a' => $datoget,
            'b' => $datoget2
        ]);
    }
}
