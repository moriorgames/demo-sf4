<?php

namespace App\Services\Shop;

use App\Entity\Article;
use App\EventListener\ArticleQueueEvent;
use App\EventListener\QueueEvents;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\EventDispatcher\EventDispatcher;

class PurchaseUseCase
{
    /**
     * @var ArticleRepository
     */
    private $repo;

    /**
     * @var EventDispatcher
     */
    private $dispatcher;

    /**
     * ShopService constructor.
     *
     * @param ArticleRepository $repo
     * @param EventDispatcher   $dispatcher
     */
    public function __construct(ArticleRepository $repo, EventDispatcher $dispatcher)
    {
        $this->repo = $repo;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param int $id
     *
     * @throws EntityNotFoundException
     */
    public function purchase(int $id)
    {
        $article = $this->repo->find($id);
        if (!$article instanceof Article) {
            throw new EntityNotFoundException('Article with id ' . $id . ' not found');
        }
        $this->dispatcher->dispatch(QueueEvents::REGISTERED, new ArticleQueueEvent($article));
    }
}
