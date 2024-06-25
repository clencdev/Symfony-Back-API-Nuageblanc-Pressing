<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\EmployRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployRepository::class)]
#[ApiResource]


class Employ extends User
{
    

    #[ORM\Column(length: 255)]
    private ?string $empId = null;

    protected ?string $plainEmpId = null;
    

    public function getEmpId(): ?string
    {
        return $this->empId;
    }

    public function setEmpId(string $empId): static
    {
        $this->empId = $empId;

        return $this;
    }

    /**
     * Get the value of plainEmpId
     */
    public function getPlainEmpId(): ?string
    {
        return $this->plainEmpId;
    }

    /**
     * Set the value of plainEmpId
     */
    public function setPlainEmpId(?string $plainEmpId): self
    {
        $this->plainEmpId = $plainEmpId;

        return $this;
    }
}
