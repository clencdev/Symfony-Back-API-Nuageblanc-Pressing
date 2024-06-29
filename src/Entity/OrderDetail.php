<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\OrderDetailRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderDetailRepository::class)]
#[ApiResource]
class OrderDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    
    #[ORM\Column]
    private ?int $quantity = null;

    /**
     * @var Collection<int, Order>
     */
    #[ORM\OneToMany(targetEntity: Order::class, mappedBy: 'OrderDetailId')]
    private Collection $OrdersId;

    #[ORM\ManyToOne(inversedBy: 'orderDetailId')]
    private ?serviceItem $ServiceItemId = null;

    public function __construct()
    {
        $this->OrdersId = new ArrayCollection();
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }


    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrdersId(): Collection
    {
        return $this->OrdersId;
    }

    public function addOrdersId(Order $ordersId): static
    {
        if (!$this->OrdersId->contains($ordersId)) {
            $this->OrdersId->add($ordersId);
            $ordersId->setOrderDetailId($this);
        }

        return $this;
    }

    public function removeOrdersId(Order $ordersId): static
    {
        if ($this->OrdersId->removeElement($ordersId)) {
            // set the owning side to null (unless already changed)
            if ($ordersId->getOrderDetailId() === $this) {
                $ordersId->setOrderDetailId(null);
            }
        }

        return $this;
    }

    public function getServiceItemId(): ?serviceItem
    {
        return $this->ServiceItemId;
    }

    public function setServiceItemId(?serviceItem $ServiceItemId): static
    {
        $this->ServiceItemId = $ServiceItemId;

        return $this;
    }

}
    