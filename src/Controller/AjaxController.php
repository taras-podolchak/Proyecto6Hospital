<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/Ajax')]
class AjaxController extends AbstractController
{
    #[Route('/Index', name: 'inicio')]
    public function inicio()
    {

        return $this->render('ajax/Index.html.twig');
    }
    #[Route('/Personas', name: 'RecuperarPersonas')]
    public function personas()
    {

        $objpersonas = [
            [
                'nombre' => 'Benito',
                'apellido' => 'Floro'
            ],
            [
                'nombre' => 'Andrea',
                'apellido' => 'Galindo'
            ],
            [
                'nombre' => 'Thor',
                'apellido' => 'Ramiro'
            ],
            [
                'nombre' => 'Alex',
                'apellido' => 'Galindo'
            ],
        ];

        return $this->render('ajax/personas.html.twig', [
            'mispersonas' => $objpersonas
        ]);
    }

    #[Route('/Lenguajes', name: 'RecuperarLenguajes')]
    public function lenguajes()
    {

        $objlenguajes = [
            [
                'nombre' => 'Symfony',
                'tipo' => 'Programación'
            ],
            [
                'nombre' => 'SQL Server',
                'tipo' => 'Base de datos'
            ],
            [
                'nombre' => 'C#',
                'tipo' => 'Programación'
            ],
            [
                'nombre' => 'Java',
                'tipo' => 'Programación'
            ],
        ];

        return $this->render('ajax/lenguajes.html.twig', [
            'mislenguajes' => $objlenguajes
        ]);
    }
}
