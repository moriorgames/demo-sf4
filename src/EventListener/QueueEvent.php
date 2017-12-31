<?php

namespace App\EventListener;

use App\Entity\Article;
use Symfony\Component\EventDispatcher\Event;

class QueueEvent extends Event
{
    private $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function getArticle(): Article
    {
        return $this->article;
    }
}
