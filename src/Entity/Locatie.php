<?php

namespace App\Entity;

use App\Repository\LocatieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocatieRepository::class)]
class Locatie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $locatie;

    #[ORM\Column(type: 'string', length: 255)]
    private $beschrijving;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $email;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $telenr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocatie(): ?string
    {
        return $this->locatie;
    }

    public function setLocatie(string $locatie): self
    {
        $this->locatie = $locatie;

        return $this;
    }

    public function getBeschrijving(): ?string
    {
        return $this->beschrijving;
    }

    public function setBeschrijving(string $beschrijving): self
    {
        $this->beschrijving = $beschrijving;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelenr(): ?string
    {
        return $this->telenr;
    }

    public function setTelenr(?string $telenr): self
    {
        $this->telenr = $telenr;

        return $this;
    }
}
