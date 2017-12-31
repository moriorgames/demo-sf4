<?php

namespace App\EventListener;

use App\Entity\Article;
use Symfony\Component\EventDispatcher\Event;

class ArticleQueueEvent extends Event
{
    /**
     * @var Article
     */
    private $article;

    /**
     * ProductionQueueEvent constructor.
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function getArticle(): Article
    {
        return $this->article;
    }
}
