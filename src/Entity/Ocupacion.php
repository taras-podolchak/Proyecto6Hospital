<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ocupacion
 *
 * @ORM\Table(name="ocupacion")
 * @ORM\Entity(repositoryClass="App\Repository\OcupacionRepository")
 */
class Ocupacion
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
     * @var int
     *
     * @ORM\Column(name="HOSPITAL_COD", type="integer", nullable=false)
     */
    private $hospitalCod;

    /**
     * @var int
     *
     * @ORM\Column(name="SALA_COD", type="integer", nullable=false)
     */
    private $salaCod;

    /**
     * @var int|null
     *
     * @ORM\Column(name="CAMA", type="integer", nullable=true)
     */
    private $cama;

    public function getInscripcion(): ?int
    {
        return $this->inscripcion;
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

    public function setSalaCod(int $salaCod): self
    {
        $this->salaCod = $salaCod;

        return $this;
    }

    public function getCama(): ?int
    {
        return $this->cama;
    }

    public function setCama(?int $cama): self
    {
        $this->cama = $cama;

        return $this;
    }


}
