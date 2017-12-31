<?php

namespace App\Services\Shop;

use App\Entity\Article;
use App\Entity\User;
use App\EventListener\QueueEvent;
use App\EventListener\QueueEvents;
use App\EventListener\PurchaseEvent;
use App\Exceptions\OutOfFundsException;
use App\Repository\ArticleRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\EventDispatcher\EventDispatcher;

class PurchaseUseCase
{
    private $articleRepo;

    private $userRepo;

    private $dispatcher;

    public function __construct(ArticleRepository $articleRepo, UserRepository $userRepo, EventDispatcher $dispatcher)
    {
        $this->articleRepo = $articleRepo;
        $this->userRepo = $userRepo;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param int $articleId
     * @param int $userId
     *
     * @throws EntityNotFoundException|OutOfFundsException
     */
    public function purchase(int $articleId, int $userId)
    {
        $article = $this->articleRepo->find($articleId);
        if (!$article instanceof Article) {
            throw new EntityNotFoundException('Article with id ' . $userId . ' not found');
        }
        $user = $this->userRepo->find($userId);
        if (!$user instanceof User) {
            throw new EntityNotFoundException('User with id ' . $userId . ' not found');
        }
        $purchaseEvent = new PurchaseEvent($article, $user);
        $event = $this->dispatcher->dispatch(QueueEvents::PRE_ORDER, $purchaseEvent);
        if ($event->isPropagationStopped()) {
            throw new OutOfFundsException('Purchase cannot be processed due to out of funds');
        }
        if (!$event->isPropagationStopped()) {
            $queueEvent = new QueueEvent($article);
            $this->dispatcher->dispatch(QueueEvents::REGISTERED, $queueEvent);
        }
    }
}
