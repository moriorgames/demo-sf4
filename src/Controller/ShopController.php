<?php

namespace App\Controller;

use App\Services\Logger\AwsLoggerService;
use App\Services\Shop\PurchaseUseCase;
use Symfony\Component\HttpFoundation\Response;

class ShopController
{
    public function purchase(int $articleId, int $userId, PurchaseUseCase $useCase, AwsLoggerService $logger): Response
    {
        try {
            $useCase->purchase($articleId, $userId);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $logger->error($message, debug_backtrace());

            return new Response($message, 404);
        }

        return new Response('Article purchased!');
    }
}
