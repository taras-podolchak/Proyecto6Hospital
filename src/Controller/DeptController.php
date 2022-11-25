<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Dept;
use App\Repository\DeptRepository;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/depart')]
class DeptController extends AbstractController
{

    #[Route('/altaDepart', name: 'nuevoDepart')]
    public function nuevoDepart()
    {
        return $this->render('dept_/alta.html.twig');
    }

    #[Route('/create', name: 'insertarDepart')]
    public function insertarDepart(Request $request, EntityManagerInterface $em)
    {
        // Podemos obtener el EntityManager a través de inyección de dependencias con el argumento EntityManagerInterface $em
        // 1) recibir datos del formulario
        $nombre = $request->request->get('txtNombre');
        $loc = $request->request->get('txtLoc');

        // 2) dar de alta en bbdd 
        $departamento = new Dept();
        $departamento->setDnombre($nombre);
        $departamento->setLoc($loc);
        // Informamos a Doctrine de que queremos guardar el Grado (todavía no se ejecuta ninguna query)

        $em->persist($departamento);
        // Para ejecutar las queries pendientes, se utiliza flush().

        //Commit
        $em->flush();

        // 3) redirigir al formulario. Coincide con eln nombre de la ruta del método anterior: name: 'nuevoDepart
        return $this->redirectToRoute("nuevoDepart");
    }

    #[Route('/borrarDepart', name: 'elimDepart')]
    public function elimDepart()
    {
        return $this->render('dept_/eliminar.html.twig');
    }

    #[Route('/eliminarDepart', name: 'eliminarDepart')]
    public function borrarDepart(Request $request, EntityManagerInterface $em)
    {

        $identificador = $request->request->get('txtId');
        $datos = $em->getRepository(Dept::class)->find($identificador);

        if (!$datos) {
            return $this->render('dept_/incorrecto.html.twig', [
                'mensaje' => 'Departamento no existe'
            ]);
        }
        $em->remove($datos);
        $em->flush();
        return $this->render('dept_/correcto.html.twig', ['mensaje' => 'Dato eliminado correctamente:' . $identificador]);
    }


    #[Route('/modifiDepart', name: 'modDepart')]
    public function modDepart()
    {
        return $this->render('dept_/modificar.html.twig');
    }


    #[Route('/ModifyDepart', name: 'ModifyDepart')]
    public function ModifyDepart(Request $request, EntityManagerInterface $em)
    {
        $identificador = $request->request->get('txtId');
        $nombre = $request->request->get('txtNombre');
        $loc = $request->request->get('txtLoc');

        $departamento = $em->getRepository(Dept::class)->find($identificador);
        $departamento->setDnombre($nombre);
        $departamento->setLoc($loc);
        $em->persist($departamento);
        $em->flush();

        return $this->redirectToRoute("modDepart");
    }


    #[Route('/getDepartList', name: 'getDepartList')]
    public function getDepartList(DeptRepository $repoDept)
    {
        return $this->render('dept_/mostrar.html.twig', ['dpartamentos' => $repoDept->findAll()]);
    }


    #[Route('/getDepart', name: 'getDepart')]
    public function getDepart(Request $request, DeptRepository $repoDept)
    {
        $idDep = $request->request->get('cmbDepart');

        return $this->render('dept_/mostrar.html.twig', [
            'dpartamentos' => $repoDept->findAll(),
            'dpartamento' => $repoDept->find($idDep),
            'idDep' => $idDep
        ]);
    }

    


    #[Route('/crudForm', name: 'crudForm')]
    public function crudForm(DeptRepository $repoDept)
    {

        return $this->render('dept_/crud.html.twig', [
            'dpartamentos' => $repoDept->findAll()
        ]);
    }

    #[Route('/crud', name: 'crud')]
    public function crud(Request $request, DeptRepository $repoDept)
    {
        $boton = $request->request->get('boton');
        $id = $request->request->get('txtId');
        $name = $request->request->get('txtNombre');
        $loc = $request->request->get('txtLoc');


        if ($boton == 'eliminar') {
            if ($id != null) {
                $departamento = $repoDept->find($id);
                if ($departamento) {
                    $repoDept->remove($departamento);
                    return $this->render('dept_/crud.html.twig', [
                        'dpartamentos' => $repoDept->findAll(),
                        'mensaje' => 'Departamento eliminado correctamente'
                    ]);
                } else {
                    return $this->render('dept_/crud.html.twig', [
                        'dpartamentos' => $repoDept->findAll(),
                        'mensaje' => 'Departamento no existe'
                    ]);
                }
            } else {
                return $this->render('dept_/crud.html.twig', [
                    'dpartamentos' => $repoDept->findAll(),
                    'mensaje' => 'Mete id para eliminar'
                ]);
            }
        } else  if ($boton == 'modificar') {
            if (
                $id != null && $name != null
            ) {
                $departamento = $repoDept->find($id);
                $departamento->setDnombre($name);
                $repoDept->add($departamento);
                return $this->render('dept_/crud.html.twig', [
                    'dpartamentos' => $repoDept->findAll(),
                    'mensaje' => 'Departamento actualizado correctamente'
                ]);
            } else if (
                $id != null &&
                $loc != null
            ) {
                $departamento = $repoDept->find($id);
                $departamento->setLoc($loc);
                $repoDept->add($departamento);
                return $this->render('dept_/crud.html.twig', [
                    'dpartamentos' => $repoDept->findAll(),
                    'mensaje' => 'Departamento actualizado correctamente'
                ]);
            } else {
                return $this->render('dept_/crud.html.twig', [
                    'dpartamentos' => $repoDept->findAll(),
                    'mensaje' => 'Rellena el id y el campo que quieres modificar'
                ]);
            }
        } else  if ($boton == 'crear') {
            if (
                $name != null &&
                $loc != null
            ) {
                $newDep = new Dept();
                $newDep->setDnombre($name);
                $newDep->setLoc($loc);
                $repoDept->add($newDep);
                return $this->render('dept_/crud.html.twig', [
                    'dpartamentos' => $repoDept->findAll(),
                    'mensaje' => 'Departamento creado correctamente'
                ]);
            } else {
                return $this->render('dept_/crud.html.twig', [
                    'dpartamentos' => $repoDept->findAll(),
                    'mensaje' => 'Los campos Nombre y Loc son opbigatorios'
                ]);
            }
        } else  if ($boton == 'mayorDe10') {
            return $this->render('dept_/crud.html.twig', [
                'dpartamentos' => $repoDept->getDepWhereIdMas10(),
                'mensaje' => 'Los registros con los ID > 10 '
            ]);
        } else  if ($boton == 'Buscar') {
            return $this->render('dept_/crud.html.twig', [
                'dpartamentos' => $repoDept->getDepFromName($request->request->get('txtBuscarNombre')),
                'mensaje' => 'Los registros con el nombre ' . $request->request->get('txtBuscarNombre')
            ]);
        } else  if ($boton == 'BuscarLetra') {
            return $this->render('dept_/crud.html.twig', [
                'dpartamentos' => $repoDept->getDepFromChar($request->request->get('txtBuscarLetra')),
                'mensaje' => 'Los registros con letra: ' . $request->request->get('txtBuscarLetra')
            ]);
        }
        return $this->render('dept_/crud.html.twig', [
            'dpartamentos' => $repoDept->findAll()
        ]);
    }


       /* procedure */


       #[Route('/filtros', name: 'eliminarDepart')]
       public function eliminarDepart(Request $request,DeptRepository $repoDept, EntityManagerInterface $em)
       {
   
           $id = $request->request->get('txtId');
           $connection = $em->getConnection();
           $statement = $connection->prepare("CALL borrarDept(:dato)");
           $statement->bindValue('dato', $id);
           $resultado = $statement->executeStatement();
   
           return $this->render('dept_/procedure.html.twig', [
               'dpartamentos' => $repoDept->findAll(),
               'afectados' => $resultado,
   
           ]);
       }
}
