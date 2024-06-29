<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ZIPRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ZIPRepository::class)]
#[ApiResource]
class ZIP
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $zip_code = null;

    /**
     * @var Collection<int, Client>
     */
    #[ORM\OneToMany(targetEntity: Client::class, mappedBy: 'ZIPId')]
    private Collection $clientId;

    public function __construct()
    {
        $this->clientId = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getZipCode(): ?string
    {
        return $this->zip_code;
    }

    public function setZipCode(string $zip_code): static
    {
        $this->zip_code = $zip_code;

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
            $clientId->setZIPId($this);
        }

        return $this;
    }

    public function removeClientId(Client $clientId): static
    {
        if ($this->clientId->removeElement($clientId)) {
            // set the owning side to null (unless already changed)
            if ($clientId->getZIPId() === $this) {
                $clientId->setZIPId(null);
            }
        }

        return $this;
    }

    
}
