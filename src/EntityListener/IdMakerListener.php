<?php

namespace App\EntityListener;

use App\Entity\Client;
use App\Entity\Employ;
use App\Service\RandomIdGenerator;


class IdMakerListener
{
    private RandomIdGenerator $randomId;

    public function __construct(RandomIdGenerator $randomId)
    {
        $this->randomId = $randomId;
    }

    public function prePersist($entity): void
    {
        if ($entity instanceof Client) {
            $this->makeClientId($entity);
        } elseif ($entity instanceof Employ) {
            $this->makeEmpId($entity);
        } 
    }

    public function preUpdate($entity): void
    {
        if ($entity instanceof Client) {
            $this->makeClientId($entity);
        } elseif ($entity instanceof Employ) {
            $this->makeEmpId($entity);
        } 
    }

    

    public function makeClientId(Client $client)
    {
        if ($client->getClientId() === null) {
            $client->setClientId(
                $this->randomId->generateClientId()
                ); 
        }  
    }

    public function makeEmpId(Employ $employ)
    {
        if ($employ->getEmpId() === null) {
            $employ->setEmpId(
                $this->randomId->generateEmpId()
            );
        }
    }
    
}
