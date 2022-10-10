<?php

namespace App\Entity;

use App\Repository\NombreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NombreRepository::class)]
class Nombre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    /**

* @ORM\Id()

* ...

*/

private $nombreCampo;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 15)]
    private ?string $telefono = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;


    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
