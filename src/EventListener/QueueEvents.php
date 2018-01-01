<?php

namespace App\EventListener;

final class QueueEvents
{
    /**
     * This event occurs after purchase
     *
     * The event listener receives an
     * App\EventSubscriber\Article\UserSubscriber instance.
     *
     * @var string
     */
    const PRE_ORDER = 'production.pre_order.registered';

    /**
     * This event occurs when a Purchase is submitted
     *
     * The event listener receives an
     * App\EventListener\ProductionQueueEvent instance.
     *
     * @var string
     */
    const REGISTERED = 'production.queue.registered';
}