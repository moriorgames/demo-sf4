<?php

namespace App\EventListener;

final class QueueEvents
{
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