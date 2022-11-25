<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Form\ClienteType;
use App\Repository\ClienteRepository;
use App\Repository\DoctorRepository;
use App\Repository\EmpRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/AjaxHospital')]
class AjaxHospitakController extends AbstractController
{
    #[Route('/IndexAjaxHospital', name: 'inicioAjaxHospital')]
    public function inicioAjaxHospital()
    {
        return $this->render('ajaxHospital/IndexAjaxHospital.html.twig');
    }

    #[Route('/ajaxClientes', name: 'ajaxGetClientes')]
    public function ajaxGetClientes(ClienteRepository $repoCliente)
    {

        return $this->render('ajaxHospital/clientes.html.twig', [
            'clientes' => $repoCliente->findAll()
        ]);
    }
    #[Route('/ajaxDoctores', name: 'ajaxGetDoctores')]
    public function ajaxGetDoctores(DoctorRepository $repoDoctor)
    {

        return $this->render('ajaxHospital/doctores.html.twig', [
            'doctores' => $repoDoctor->findAll()
        ]);
    }

    #[Route('/ajaxEmpleados', name: 'ajaxGetEmpleados')]
    public function ajaxGetEmpleados(EmpRepository $repoEmp)
    {

        return $this->render('ajaxHospital/emp.html.twig', [
            'empleados' => $repoEmp->findAll()
        ]);
    }

    // return $this->response(object)
}
