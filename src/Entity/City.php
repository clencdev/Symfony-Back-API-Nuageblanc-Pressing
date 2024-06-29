<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CityRepository::class)]
#[ApiResource]
class City
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    /**
     * @var Collection<int, Client>
     */
    #[ORM\OneToMany(targetEntity: Client::class, mappedBy: 'cityId')]
    private Collection $clientId;

    public function __construct()
    {
        $this->clientId = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClientId(): Collection
    {
        return $this->clientId;
    }

    public function addClientId(Client $clientId): static
    {
        if (!$this->clientId->contains($clientId)) {
            $this->clientId->add($clientId);
            $clientId->setCityId($this);
        }

        return $this;
    }

    public function removeClientId(Client $clientId): static
    {
        if ($this->clientId->removeElement($clientId)) {
            // set the owning side to null (unless already changed)
            if ($clientId->getCityId() === $this) {
                $clientId->setCityId(null);
            }
        }

        return $this;
    }

    
}
