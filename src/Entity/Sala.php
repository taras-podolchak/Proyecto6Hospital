<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sala
 *
 * @ORM\Table(name="sala")
 * @ORM\Entity(repositoryClass="App\Repository\SalaRepository")
 */
class Sala
{
    /**
     * @var int
     *
     * @ORM\Column(name="idSala", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsala;

    /**
     * @var int
     *
     * @ORM\Column(name="HOSPITAL_COD", type="integer", nullable=false)
     */
    private $hospitalCod;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SALA_COD", type="integer", nullable=true)
     */
    private $salaCod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOMBRE", type="string", length=40, nullable=true)
     */
    private $nombre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="NUM_CAMA", type="integer", nullable=true)
     */
    private $numCama;

    public function getIdsala(): ?int
    {
        return $this->idsala;
    }

    public function getHospitalCod(): ?int
    {
        return $this->hospitalCod;
    }

    public function setHospitalCod(int $hospitalCod): self
    {
        $this->hospitalCod = $hospitalCod;

        return $this;
    }

    public function getSalaCod(): ?int
    {
        return $this->salaCod;
    }

    public function setSalaCod(?int $salaCod): self
    {
        $this->salaCod = $salaCod;

        return $this;
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
