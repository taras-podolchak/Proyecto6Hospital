<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enfermo
 *
 * @ORM\Table(name="enfermo")
 * @ORM\Entity(repositoryClass="App\Repository\EnfermoRepository")
 */
class Enfermo
{
    /**
     * @var int
     *
     * @ORM\Column(name="INSCRIPCION", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $inscripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="APELLIDO", type="string", length=40, nullable=true)
     */
    private $apellido;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DIRECCION", type="string", length=50, nullable=true)
     */
    private $direccion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FECHA_NAC", type="date", nullable=true)
     */
    private $fechaNac;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SEXO", type="string", length=1, nullable=true)
     */
    private $sexo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="NSS", type="integer", nullable=true)
     */
    private $nss;

    public function getInscripcion(): ?int
    {
        return $this->inscripcion;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(?string $apellido): self
    {
        $this->apellido = $apellido;

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

    public function getFechaNac(): ?\DateTimeInterface
    {
        return $this->fechaNac;
    }

    public function setFechaNac(?\DateTimeInterface $fechaNac): self
    {
        $this->fechaNac = $fechaNac;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(?string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getNss(): ?int
    {
        return $this->nss;
    }

    public function setNss(?int $nss): self
    {
        $this->nss = $nss;

        return $this;
    }


}
