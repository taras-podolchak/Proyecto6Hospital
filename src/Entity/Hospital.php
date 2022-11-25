<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hospital
 *
 * @ORM\Table(name="hospital")
 * @ORM\Entity(repositoryClass="App\Repository\HospitalRepository")
 */
class Hospital
{
    /**
     * @var int
     *
     * @ORM\Column(name="HOSPITAL_COD", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hospitalCod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOMBRE", type="string", length=40, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DIRECCION", type="string", length=50, nullable=true)
     */
    private $direccion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TELEFONO", type="string", length=9, nullable=true)
     */
    private $telefono;

    /**
     * @var int|null
     *
     * @ORM\Column(name="NUM_CAMA", type="integer", nullable=true)
     */
    private $numCama;

    public function getHospitalCod(): ?int
    {
        return $this->hospitalCod;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(?string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getNumCama(): ?int
    {
        return $this->numCama;
    }

    public function setNumCama(?int $numCama): self
    {
        $this->numCama = $numCama;

        return $this;
    }


}
