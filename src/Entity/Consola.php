<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConsolaRepository")
 */
class Consola
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Rellene este campo")
     * @ORM\Column(type="string", length=255)
     */
    private $Nombre;

    /**
     * @Assert\NotBlank(message="Rellene este campo")
     * @ORM\Column(type="string", length=255)
     */
    private $Compania;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Fecha_Salida;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getCompania(): ?string
    {
        return $this->Compania;
    }

    public function setCompania(string $Compania): self
    {
        $this->Compania = $Compania;

        return $this;
    }

    public function getFechaSalida(): ?\DateTimeInterface
    {
        return $this->Fecha_Salida;
    }

    public function setFechaSalida(?\DateTimeInterface $Fecha_Salida): self
    {
        $this->Fecha_Salida = $Fecha_Salida;

        return $this;
    }
}
