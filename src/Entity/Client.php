<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ApiResource]



class Client extends User
{
    

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    /**
     * @var Collection<int, Order>
     */
    #[ORM\OneToMany(targetEntity: Order::class, mappedBy: 'ClientId')]
    private Collection $orderId;

    #[ORM\ManyToOne(inversedBy: 'clientId')]
    private ?city $cityId = null;

    #[ORM\ManyToOne(inversedBy: 'clientId')]
    private ?Zip $ZIPId = null;

    public function __construct()
    {
        $this->orderId = new ArrayCollection();
    }

    


    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrderId(): Collection
    {
        return $this->orderId;
    }

    public function addOrderId(Order $orderId): static
    {
        if (!$this->orderId->contains($orderId)) {
            $this->orderId->add($orderId);
            $orderId->setClientId($this);
        }

        return $this;
    }

    public function removeOrderId(Order $orderId): static
    {
        if ($this->orderId->removeElement($orderId)) {
            // set the owning side to null (unless already changed)
            if ($orderId->getClientId() === $this) {
                $orderId->setClientId(null);
            }
        }

        return $this;
    }

    public function getCityId(): ?city
    {
        return $this->cityId;
    }

    public function setCityId(?city $cityId): static
    {
        $this->cityId = $cityId;

        return $this;
    }

    public function getZIPId(): ?Zip
    {
        return $this->ZIPId;
    }

    public function setZIPId(?Zip $ZIPId): static
    {
        $this->ZIPId = $ZIPId;

        return $this;
    }


    
}
