<?php

namespace App\Controller;

use App\Entity\Doctor;
use App\Form\DoctorType;
use App\Repository\DoctorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/doctor')]
class DoctorController extends AbstractController
{
    /*   #[Route('/', name: 'app_doctor_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $doctors = $entityManager
            ->getRepository(Doctor::class)
            ->findAll();

        return $this->render('doctor/index.html.twig', [
            'doctors' => $doctors,
        ]);
    }

    #[Route('/new', name: 'app_doctor_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $doctor = new Doctor();
        $form = $this->createForm(DoctorType::class, $doctor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($doctor);
            $entityManager->flush();

            return $this->redirectToRoute('app_doctor_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('doctor/new.html.twig', [
            'doctor' => $doctor,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_doctor_show', methods: ['GET'])]
    public function show(Doctor $doctor): Response
    {
        return $this->render('doctor/show.html.twig', [
            'doctor' => $doctor,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_doctor_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Doctor $doctor, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DoctorType::class, $doctor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_doctor_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('doctor/edit.html.twig', [
            'doctor' => $doctor,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_doctor_delete', methods: ['POST'])]
    public function delete(Request $request, Doctor $doctor, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $doctor->getId(), $request->request->get('_token'))) {
            $entityManager->remove($doctor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_doctor_index', [], Response::HTTP_SEE_OTHER);
    }

    /* *************** */
    #[Route('/procedureDoctorAlta', name: 'procedureDoctorAlta')]
    public function procedureDoctorAlta(Request $request, DoctorRepository $repoDoctor, EntityManagerInterface $em)
    {

        $hospitalCod = $request->request->get('numHospCod');
        $apellido = $request->request->get('txtApellido');
        $especialidad = $request->request->get('txtEspecialidad');
        $salario = $request->request->get('txtSalario');

        if (
            $hospitalCod != null &&
            $apellido != null &&
            $especialidad != null &&
            $salario != null
        ) {
            $newDoctor = new Doctor();
            $newDoctor->setHospitalCod($hospitalCod);
            $newDoctor->setApellido($apellido);
            $newDoctor->setEspecialidad($especialidad);
            $newDoctor->setSalario($salario);

            $statement = $em->getConnection()->prepare("CALL insertarDoctor(:hospital_cod, :apellido, :especialidad, :salario)");
            $statement->bindValue('hospital_cod', $hospitalCod);
            $statement->bindValue('apellido', $apellido);
            $statement->bindValue('especialidad', $especialidad);
            $statement->bindValue('salario', $salario);
            $statement->executeStatement();
        }


        return $this->render('doctor_/procedureDoctorAlta.html.twig', [
            'doctores' => $repoDoctor->findAll(),
        ]);
    }
}
