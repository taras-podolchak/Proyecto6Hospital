<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity(repositoryClass="App\Repository\ClienteRepository")
 */
class Cliente
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellido1", type="string", length=50, nullable=true)
     */
    private $apellido1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellido2", type="string", length=50, nullable=true)
     */
    private $apellido2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="domicilio", type="string", length=50, nullable=true)
     */
    private $domicilio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ciudad", type="string", length=50, nullable=true)
     */
    private $ciudad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sexo", type="string", length=50, nullable=true)
     */
    private $sexo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="s_o", type="string", length=50, nullable=true)
     */
    private $sO;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comentario", type="string", length=50, nullable=true)
     */
    private $comentario;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getApellido1(): ?string
    {
        return $this->apellido1;
    }

    public function setApellido1(?string $apellido1): self
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    public function getApellido2(): ?string
    {
        return $this->apellido2;
    }

    public function setApellido2(?string $apellido2): self
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    public function getDomicilio(): ?string
    {
        return $this->domicilio;
    }

    public function setDomicilio(?string $domicilio): self
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(?string $ciudad): self
    {
        $this->ciudad = $ciudad;

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

    public function getSO(): ?string
    {
        return $this->sO;
    }

    public function setSO(?string $sO): self
    {
        $this->sO = $sO;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(?string $comentario): self
    {
        $this->comentario = $comentario;

        return $this;
    }


}
