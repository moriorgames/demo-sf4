<?php

namespace App\Repository;

use App\Entity\ProductionQueue;
use Doctrine\ORM\EntityRepository;

class ProductionQueueRepository extends EntityRepository
{
    public function pushToQueue(ProductionQueue $queue): void
    {
        $this->_em->persist($queue);
        $this->_em->flush();
    }
}
