<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

#[Route('/INTERNACIONALIZACION')]
class INTERNACIONALIZACIÓNController extends AbstractController
{
    #[Route('/{_locale}/inicio', name: 'app_emp_index',)]

    public function index(Request $request, TranslatorInterface $translator)
    {
        $locale = $request->getLocale();

        // Podríamos recuperarlo por código y enviarlo a la vista
        //¡$dato = $translator->trans('mensajenombre');

        return $this->render(
            'INTERNACIONALIZACION/Index.html.twig',
            ['idioma' => $locale]
        );
    }

    #[Route('/inicioCarnet', name: 'inicioCarnet',)]
    public function inicioCarnet()
    {
        return $this->render(
            'INTERNACIONALIZACION/inicioCarnet.html.twig'
        );
    }

    #[Route('/{_locale}/formularioCarnet', name: 'formularioCarnet',)]
    public function formularioCarnet()
    {
        return $this->render(
            'INTERNACIONALIZACION/formularioCarnet.html.twig'
        );
    }

    #[Route('/{_locale}/formularioCarnet2', name: 'formularioCarnet2',)]
    public function formularioCarnet2(Request $request)
    {
        $redireccion = new RedirectResponse('/');

        if ($request->query->get('id') == "es") {
            $redireccion->setTargetUrl('http://localhost:8000/INTERNACIONALIZACION/es/formularioCarnet');
        }
        if ($request->query->get('id') == "en") {
            $redireccion->setTargetUrl('http://localhost:8000/INTERNACIONALIZACION/en/formularioCarnet');
        }
        return $redireccion;
    }
}
