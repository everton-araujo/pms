<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthdayDate = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column]
    private ?int $wage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $hiringDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $firingDate = null;

    #[ORM\Column(length: 255)]
    private ?string $occupation = null;

    #[ORM\ManyToMany(targetEntity: Building::class, mappedBy: 'manager')]
    private Collection $buildings;

    #[ORM\ManyToOne(inversedBy: 'document')]
    private ?Address $address = null;

    #[ORM\OneToMany(mappedBy: 'employee', targetEntity: Document::class)]
    private Collection $document;

    public function __construct()
    {
        $this->buildings = new ArrayCollection();
        $this->document = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthdayDate(): ?\DateTimeInterface
    {
        return $this->birthdayDate;
    }

    public function setBirthdayDate(\DateTimeInterface $birthdayDate): self
    {
        $this->birthdayDate = $birthdayDate;

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

    public function getWage(): ?int
    {
        return $this->wage;
    }

    public function setWage(int $wage): self
    {
        $this->wage = $wage;

        return $this;
    }

    public function getHiringDate(): ?\DateTimeInterface
    {
        return $this->hiringDate;
    }

    public function setHiringDate(\DateTimeInterface $hiringDate): self
    {
        $this->hiringDate = $hiringDate;

        return $this;
    }

    public function getFiringDate(): ?\DateTimeInterface
    {
        return $this->firingDate;
    }

    public function setFiringDate(?\DateTimeInterface $firingDate): self
    {
        $this->firingDate = $firingDate;

        return $this;
    }

    public function getOccupation(): ?string
    {
        return $this->occupation;
    }

    public function setOccupation(string $occupation): self
    {
        $this->occupation = $occupation;

        return $this;
    }

    /**
     * @return Collection<int, Building>
     */
    public function getBuildings(): Collection
    {
        return $this->buildings;
    }

    public function addBuilding(Building $building): self
    {
        if (!$this->buildings->contains($building)) {
            $this->buildings->add($building);
            $building->addManager($this);
        }

        return $this;
    }

    public function removeBuilding(Building $building): self
    {
        if ($this->buildings->removeElement($building)) {
            $building->removeManager($this);
        }

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
     * @return Collection<int, Document>
     */
    public function getDocument(): Collection
    {
        return $this->document;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->document->contains($document)) {
            $this->document->add($document);
            $document->setEmployee($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->document->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getEmployee() === $this) {
                $document->setEmployee(null);
            }
        }

        return $this;
    }
}
