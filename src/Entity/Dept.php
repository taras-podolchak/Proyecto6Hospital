<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dept
 *
 * @ORM\Table(name="dept")
 * @ORM\Entity(repositoryClass="App\Repository\DeptRepository")
 */
class Dept
{
    /**
     * @var int
     *
     * @ORM\Column(name="DEPT_NO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $deptNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DNOMBRE", type="string", length=40, nullable=true)
     */
    private $dnombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LOC", type="string", length=50, nullable=true)
     */
    private $loc;

    public function getDeptNo(): ?int
    {
        return $this->deptNo;
    }

    public function getDnombre(): ?string
    {
        return $this->dnombre;
    }

    public function setDnombre(?string $dnombre): self
    {
        $this->dnombre = $dnombre;

        return $this;
    }

    public function getLoc(): ?string
    {
        return $this->loc;
    }

    public function setLoc(?string $loc): self
    {
        $this->loc = $loc;

        return $this;
    }


}
