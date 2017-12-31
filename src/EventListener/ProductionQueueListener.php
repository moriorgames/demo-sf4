<?php

namespace App\EventListener;

use App\Repository\ProductionQueueRepository;
use App\Services\Queue\ProductionQueueFactory;

class ProductionQueueListener
{
    private $repo;

    public function __construct(ProductionQueueRepository $repo)
    {
        $this->repo = $repo;
    }

    public function onRegister(ArticleQueueEvent $event)
    {
        $queue = ProductionQueueFactory::create(
            $event->getArticle()
        );
        $this->repo->pushToQueue($queue);
    }
}
