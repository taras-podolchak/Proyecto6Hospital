<?php

namespace App\Repository;


use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class WebApiRepository extends ServiceEntityRepository
{
    public function __construct()
    {
    }

    public function getEmpleadosWebApi1()
    {
        // Cuando es true, los objects JSON devueltos serán convertidos a array asociativos, 
        // Cuando es false los objects JSON devueltos serán convertidos a objects.

        $datos = file_get_contents("https://apiempleadospgs.azurewebsites.net/api/Empleados");
        return json_decode($datos, true);
    }

    public function getJugadoresWebApi2()
    {
        $datos = file_get_contents("https://swapi.dev/api/people/");
        return json_decode($datos, true);
    }

    public function getLibrosWebApi3()
    {
        $datos = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=search+terms");
        return json_decode($datos, true);
    }

    public function getCentroDeDiaWebApi4()
    {
        //$datos = file_get_contents("https://datos.madrid.es/portal/site/egob/menuitem.ac61933d6ee3c31cae77ae7784f1a5a0/?vgnextoid=00149033f2201410VgnVCM100000171f5a0aRCRD&format=json&file=0&filename=200342-0-centros-dia&mgmtid=22bceca8a5a03410VgnVCM1000000b205a0aRCRD&preview=full");
        $datos = file_get_contents("https://webapihospital.azurewebsites.net/api/getCentroDeDiaWebApi");
        return json_decode($datos, true);
    }

    public function getPeliculasWebApi5()
    {
        $datos = file_get_contents("https://servicioapipeliculas.azurewebsites.net/api/Peliculas");
        return json_decode($datos, true);
    }

    public function getPeliculaWebApi5(String $titulo)//no aplicado
    {
        $datos = file_get_contents("https://servicioapipeliculas.azurewebsites.net/api/peliculastitulo/" . $titulo);
        return json_decode($datos, true);
    }

    public function getPersonasWebApi6()
    {
        $datos = file_get_contents("http://localhost:8000/lecturaget/");
        return json_decode($datos, true);

    }

    public function getEmpApiWeb7()
    {
        $datos = file_get_contents("http://localhost:8000/apiWebEmp/getEmpApiWeb/");
        return json_decode($datos, true);

    }

    public function getPersonaApiWebNET8()
    {
        $datos = file_get_contents("https://webapihospital.azurewebsites.net/api/getPersona");
        return json_decode($datos, true);

    }

    public function getPersonasApiWebNET9()
    {
        $datos = file_get_contents("https://webapihospital.azurewebsites.net/api/getPersonas");
        return json_decode($datos, true);

    }

    public function getPersonaWebApi9BuscarPersonaNombre(string $nombre)
    {
        $datos = file_get_contents("https://webapihospital.azurewebsites.net/api/getPersonaWebApi9BuscarPersonaNombre/".$nombre);
        return json_decode($datos, true);

    }
    public function getPersonaWebApi9BuscarPersonaDescripcion(string $descripcion)
    {
        $datos = file_get_contents("https://webapihospital.azurewebsites.net/api/getPersonaWebApi9BuscarPersonaDescripcion/".$descripcion);
        return json_decode($datos, true);

    }
}
