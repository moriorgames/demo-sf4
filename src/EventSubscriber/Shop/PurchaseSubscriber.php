<?php

namespace App\EventSubscriber\Shop;

use App\Entity\Article;
use App\EventListener\QueueEvents;
use App\EventListener\PurchaseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PurchaseSubscriber implements EventSubscriberInterface
{
    private $articlePrice;

    public static function getSubscribedEvents()
    {
        return [
            QueueEvents::PRE_ORDER => [
                ['hasSpecialDiscount', 100],
                ['subtractFunds', 50],
                ['sendMail', 0],
            ],
        ];
    }

    public function hasSpecialDiscount(PurchaseEvent $event)
    {
        $article = $event->getArticle();
        $this->articlePrice = $article->getPrice();
        if ($event->getUser()->isVip()) {
            $this->articlePrice = $article->getPrice() * Article::SPECIAL_DISCOUNT;
        }
    }

    public function subtractFunds(PurchaseEvent $event)
    {
        $user = $event->getUser();
        if ($user->getFunds() >= $this->articlePrice) {
            $user->subtractFunds($this->articlePrice);
        } else {
            $event->stopPropagation();
        }
    }

    public function sendMail(PurchaseEvent $event)
    {
        // Send Email To user
        dump($event->getUser()->getEmail());
    }
}
