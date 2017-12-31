<?php

namespace App\Services\Shop;

use App\Entity\Article;

class ArticleFactory
{
    public static function execute(string $name, float $price, string $description): Article
    {
        $article = new Article;
        $article->setName($name);
        $article->setPrice($price);
        $article->setDescription($description);

        return $article;
    }
}
