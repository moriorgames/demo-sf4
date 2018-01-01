<?php

namespace App\EventListener;

use App\Entity\Article;
use App\Entity\User;
use Symfony\Component\EventDispatcher\Event;

class PurchaseEvent extends Event
{
    private $article;

    private $user;

    public function __construct(Article $article, User $user)
    {
        $this->user = $user;
        $this->article = $article;
    }

    public function getArticle(): Article
    {
        return $this->article;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
