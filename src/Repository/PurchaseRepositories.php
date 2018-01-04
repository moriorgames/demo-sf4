<?php

namespace App\Repository;

class PurchaseRepositories
{
    private $articleRepo;

    private $userRepo;

    public function __construct(ArticleRepository $articleRepo, UserRepository $userRepo)
    {
        $this->articleRepo = $articleRepo;
        $this->userRepo = $userRepo;
    }

    public function getArticleRepo(): ArticleRepository
    {
        return $this->articleRepo;
    }

    public function getUserRepo(): UserRepository
    {
        return $this->userRepo;
    }
}
