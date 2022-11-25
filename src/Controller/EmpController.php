<?php

namespace App\Controller;

use App\Entity\Emp;
use App\Repository\EmpRepository;
use Knp\Component\Pager\PaginatorInterface;
use App\Form\EmpType;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Stmt\Foreach_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/emp')]
class EmpController extends AbstractController
{
    /*
    #[Route('/', name: 'app_emp_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $emps = $entityManager
            ->getRepository(Emp::class)
            ->findAll();

        return $this->render('emp/index.html.twig', [
            'emps' => $emps,
        ]);
    }

    #[Route('/new', name: 'app_emp_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $emp = new Emp();
        $form = $this->createForm(EmpType::class, $emp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($emp);
            $entityManager->flush();

            return $this->redirectToRoute('app_emp_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('emp/new.html.twig', [
            'emp' => $emp,
            'form' => $form,
        ]);
    }

    #[Route('/{empNo}', name: 'app_emp_show', methods: ['GET'])]
    public function show(Emp $emp): Response
    {
        return $this->render('emp/show.html.twig', [
            'emp' => $emp,
        ]);
    }

    #[Route('/{empNo}/edit', name: 'app_emp_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Emp $emp, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EmpType::class, $emp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_emp_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('emp/edit.html.twig', [
            'emp' => $emp,
            'form' => $form,
        ]);
    }

    #[Route('/{empNo}', name: 'app_emp_delete', methods: ['POST'])]
    public function delete(Request $request, Emp $emp, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $emp->getEmpNo(), $request->request->get('_token'))) {
            $entityManager->remove($emp);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_emp_index', [], Response::HTTP_SEE_OTHER);
    }

    /* fin por defecto */

    #[Route('/paginar', name: 'paginar')]
    public function paginar(Request $request, PaginatorInterface $paginator, EmpRepository $repoEmp)
    {
        $query = $repoEmp->findAll();

        // Paginar los resultados de la consulta
        $datosPaginados = $paginator->paginate(
            // Consulta sin ejecutar
            $query,
            // Definir el parámetro de la página recogida por GET
            $request->query->getInt('page', 1),

            // Número de elementos por página
            6
        );
        dump($datosPaginados);
        return $this->render('emp_/paginatorEmp.html.twig', [
            'datosP' => $datosPaginados
        ]);
    }

    #[Route('/hiperVinculoEmp', name: 'hiperVinculoEmp')]
    public function hiperVinculoEmp(EmpRepository $repoEmp)
    {
        return $this->render('emp_/hiperVinculoEmp.html.twig', [
            'oficios' => $repoEmp->getEmpDistinOficio()
        ]);
    }

    #[Route('/getEmpHiperVinculo', name: 'getEmpHiperVinculo')]
    public function getEmpHiperVinculo(Request $request, EmpRepository $repoEmp)
    {
        return $this->render('emp_/emp.html.twig', [
            'empleados' => $repoEmp->getEmpFromOficio($request->query->get('oficio'))
        ]);
    }

    #[Route('/getEmpleadoHiperVinculo', name: 'getEmpleadoHiperVinculo')]
    public function getEmpleadoHiperVinculo(Request $request, EmpRepository $repoEmp)
    {
        return $this->render('emp_/empleado.html.twig', [
            'empleado' => $repoEmp->getEmpFromEmpNo($request->query->get('empNo'))
        ]);
    }

    #[Route('/empleadoConSesion', name: 'empleadoConSesion')]
    public function empleadoConSesion(Request $request, EmpRepository $repoEmp)
    {
        return $this->render('emp_/empleadoSesion.html.twig', [
            'empleados' => $repoEmp->findAll()
        ]);
    }
    /*
    #[Route('/method', name: 'method')]
    public function method(Request $request, EmpRepository $repoEmp,)
    {
        $session = $request->getSession();

        $id = $request->query->get('id');

        $session->set($id, $id);
        dump($session);
        return $this->render('emp_/empleadoSesion.html.twig', [
            'empleados' => $repoEmp->findAll()
        ]);
    }
*/

    #[Route('/method', name: 'method')]
    public function method(Request $request, EmpRepository $repoEmp,)
    {
        $session = $request->getSession();

        $arrIds = $session->get('arr');
        $arrIds[] = (int)$request->query->get('id');
        $session->set('arr', $arrIds);
        dump($arrIds);

        return $this->render('emp_/empleadoSesion.html.twig', [
            'empleados' => $repoEmp->findAll(),
        ]);
    }


    #[Route('/methodClear', name: 'methodClear')]
    public function methodClear(Request $request, EmpRepository $repoEmp,)
    {
        $session = $request->getSession();
        $session->clear();
        return $this->render('emp_/empleadoSesion.html.twig', [
            'empleados' => $repoEmp->findAll(),
        ]);
    }


    #[Route('/methodCalcular', name: 'methodCalcular')]
    public function methodCalcular(Request $request, EmpRepository $repoEmp,)
    {
        $session = $request->getSession();
        $salario = 0;
        $arrEmp = [];

        foreach ($session->get('arr')  as $id) {
            if ($id != 0) {
                $empleado = $repoEmp->getEmpFromEmpNo($id);
                $salario += $empleado->getSalario();
                $arrEmp[] = $empleado;
            }
        }

        return $this->render('emp_/empleadoSesion.html.twig', [
            'empleados' => $repoEmp->findAll(),
            'arrEmp' => $arrEmp,
            'aviso' => "Suma salarial:" . $salario
        ]);
    }

    #[Route('/methodClearOne', name: 'methodClearOne')]
    public function methodClearOne(Request $request, EmpRepository $repoEmp,)
    {
        $session = $request->getSession();
        $arrIds = $session->get('arr');
        dump($arrIds);
        foreach ($arrIds as $i => $id) {
            if ($id == $request->query->get('idClear')) {
                unset($arrIds[$i]);
            }
        }
        $session->set('arr', $arrIds);

        // $session->remove($request->query->get('idClear'));

        return $this->redirectToRoute('method');
    }
}
