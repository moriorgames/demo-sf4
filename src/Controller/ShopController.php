<?php

namespace App\Controller;

use App\Services\Shop\PurchaseUseCase;
use Symfony\Component\HttpFoundation\Response;

class ShopController
{
    public function purchase(int $articleId, int $userId, PurchaseUseCase $useCase): Response
    {
        try {
            $useCase->purchase($articleId, $userId);
        } catch (\Exception $e) {
            $e->getMessage();

            return new Response($e->getMessage(), 404);
        }

        return new Response('Article purchased!');
    }
}
