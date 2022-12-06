<?php

namespace App\Entity;

use App\Repository\InformationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InformationRepository::class)]
class Information
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'information')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Driver $driver = null;

    #[ORM\Column(length: 100)]
    private ?string $direction = null;

    #[ORM\Column(length: 100)]
    private ?string $cargo = null;

    #[ORM\Column]
    private ?int $time = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDriver(): ?Driver
    {
        return $this->driver;
    }

    public function setDriver(?Driver $driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    public function getDirection(): ?string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): self
    {
        $this->direction = $direction;

        return $this;
    }

    public function getCargo(): ?string
    {
        return $this->cargo;
    }

    public function setCargo(string $cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getTime(): ?int
    {
        return $this->time;
    }

    public function setTime(int $time): self
    {
        $this->time = $time;

        return $this;
    }
	public function __toString()
    {
        return $this->getId();
    }
}
