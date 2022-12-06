<?php

namespace App\Entity;

use App\Repository\DriverRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DriverRepository::class)]
class Driver
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $surname = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $expirience = null;

    #[ORM\OneToMany(mappedBy: 'driver', targetEntity: Information::class)]
    private Collection $information;

    public function __construct()
    {
        $this->information = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getExpirience(): ?int
    {
        return $this->expirience;
    }

    public function setExpirience(int $expirience): self
    {
        $this->expirience = $expirience;

        return $this;
    }

    /**
     * @return Collection<int, Information>
     */
    public function getInformation(): Collection
    {
        return $this->information;
    }

    public function addInformation(Information $information): self
    {
        if (!$this->information->contains($information)) {
            $this->information->add($information);
            $information->setDriver($this);
        }

        return $this;
    }

    public function removeInformation(Information $information): self
    {
        if ($this->information->removeElement($information)) {
            // set the owning side to null (unless already changed)
            if ($information->getDriver() === $this) {
                $information->setDriver(null);
            }
        }

        return $this;
    }
	public function __toString()
    {
        return $this->getSurname();
    }
}
