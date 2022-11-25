<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Dept;
use App\Repository\DeptRepository;
use Doctrine\ORM\EntityManagerInterface;

class Sum_MultController extends AbstractController
{

  

    #[Route('/sumar_multiplicar', name: 'sumar_multiplicar')]
    public function sumar_multiplicar(Request $request)
    {
        return $this->render('sumar_multiplicar.html.twig');
    }

    #[Route('/multiplesDatos', name: 'multiples')]
    public function multiples(Request $request)
    {
        $dato = $request->request->get('operacion');
        $num1 = $request->request->get('numero1');
        $num2 = $request->request->get('numero2');

        if ($dato == 'sumarNumeros') {
            $resultado = $num1 + $num2;
            $operacion = "SUMA";
        } else {
            $resultado = $num1 * $num2;
            $operacion = "MULTIPLICACIÓN";
        }

        return $this->render('sumar_multiplicar.html.twig', [
            'operacion' => $operacion,
            'resultado' => $resultado

        ]);
    }
}
