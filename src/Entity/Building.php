<?php

namespace App\Entity;

use App\Repository\BuildingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BuildingRepository::class)]
class Building
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $phoneNumber1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $phoneNumber2 = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\ManyToMany(targetEntity: Employee::class, inversedBy: 'buildings')]
    private Collection $manager;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Address $address = null;

    #[ORM\ManyToMany(targetEntity: BuildingService::class, inversedBy: 'buildings')]
    private Collection $services;

    public function __construct()
    {
        $this->manager = new ArrayCollection();
        $this->services = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPhoneNumber1(): ?int
    {
        return $this->phoneNumber1;
    }

    public function setPhoneNumber1(int $phoneNumber1): self
    {
        $this->phoneNumber1 = $phoneNumber1;

        return $this;
    }

    public function getPhoneNumber2(): ?int
    {
        return $this->phoneNumber2;
    }

    public function setPhoneNumber2(?int $phoneNumber2): self
    {
        $this->phoneNumber2 = $phoneNumber2;

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

    /**
     * @return Collection<int, Employee>
     */
    public function getManager(): Collection
    {
        return $this->manager;
    }

    public function addManager(Employee $manager): self
    {
        if (!$this->manager->contains($manager)) {
            $this->manager->add($manager);
        }

        return $this;
    }

    public function removeManager(Employee $manager): self
    {
        $this->manager->removeElement($manager);

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, BuildingService>
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(BuildingService $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services->add($service);
        }

        return $this;
    }

    public function removeService(BuildingService $service): self
    {
        $this->services->removeElement($service);

        return $this;
    }
}
