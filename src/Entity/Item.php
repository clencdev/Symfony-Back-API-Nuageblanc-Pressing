<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
#[ApiResource]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne]
    private ?material $materialId = null;

    /**
     * @var Collection<int, ServiceItem>
     */
    #[ORM\OneToMany(targetEntity: ServiceItem::class, mappedBy: 'ItemId')]
    private Collection $serviceItemId;

   

    public function __construct()
    {
        $this->serviceItemId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getMaterialId(): ?material
    {
        return $this->materialId;
    }

    public function setMaterialId(?material $materialId): static
    {
        $this->materialId = $materialId;

        return $this;
    }

    /**
     * @return Collection<int, ServiceItem>
     */
    public function getServiceItemId(): Collection
    {
        return $this->serviceItemId;
    }

    public function addServiceItemId(ServiceItem $serviceItemId): static
    {
        if (!$this->serviceItemId->contains($serviceItemId)) {
            $this->serviceItemId->add($serviceItemId);
            $serviceItemId->setItemId($this);
        }

        return $this;
    }

    public function removeServiceItemId(ServiceItem $serviceItemId): static
    {
        if ($this->serviceItemId->removeElement($serviceItemId)) {
            // set the owning side to null (unless already changed)
            if ($serviceItemId->getItemId() === $this) {
                $serviceItemId->setItemId(null);
            }
        }

        return $this;
    }

    
}
