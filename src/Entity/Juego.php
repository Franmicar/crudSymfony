<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JuegoRepository")
 */
class Juego
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
    private $Desarrolladora;

    /**
     * @Assert\NotBlank(message="Rellene este campo")
     * @Assert\Type(type = "numeric", message = "Introduce un número")
     * @Assert\Range(
     *      min = 1,
     *      max = 9999,
     *      minMessage = "You must be at least {{ limit }}cm tall to enter",
     *      maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )
     * @Assert\Positive(
     *     message="El número debe ser positivo"
     * )
     * @ORM\Column(type="integer")
     */
    private $Duracion;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Fecha;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Genero;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Estado;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Imagen;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Consola")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Plataforma;

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

    public function getDesarrolladora(): ?string
    {
        return $this->Desarrolladora;
    }

    public function setDesarrolladora(string $Desarrolladora): self
    {
        $this->Desarrolladora = $Desarrolladora;

        return $this;
    }

    public function getDuracion(): ?int
    {
        return $this->Duracion;
    }

    public function setDuracion(int $Duracion): self
    {
        $this->Duracion = $Duracion;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->Fecha;
    }

    public function setFecha(?\DateTimeInterface $Fecha): self
    {
        $this->Fecha = $Fecha;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->Genero;
    }

    public function setGenero(string $Genero): self
    {
        $this->Genero = $Genero;

        return $this;
    }

    public function getEstado(): ?bool
    {
        return $this->Estado;
    }

    public function setEstado(bool $Estado): self
    {
        $this->Estado = $Estado;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->Imagen;
    }

    public function setImagen(?string $Imagen): self
    {
        $this->Imagen = $Imagen;

        return $this;
    }

    public function getPlataforma(): ?Consola
    {
        return $this->Plataforma;
    }

    public function setPlataforma(?Consola $Plataforma): self
    {
        $this->Plataforma = $Plataforma;

        return $this;
    }
}
