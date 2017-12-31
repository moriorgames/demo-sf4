<?php

namespace App\Services\Queue;

use App\Entity\Article;
use App\Entity\ProductionQueue;

class ProductionQueueFactory
{
    public static function create(Article $article): ProductionQueue
    {
        $productionQueue = new ProductionQueue;
        $productionQueue->setArticle($article);
        $productionQueue->setCreatedAt(new \DateTime);

        return $productionQueue;
    }
}
