<?php

declare(strict_types=1);

namespace app\Providers;

use Egal\LaravelEventBus\AbstractEventBus;
use Egal\LaravelEventBus\ServiceProvider;

class EventBusServiceProvider extends ServiceProvider
{

    protected function registerEvents(AbstractEventBus $bus): void
    {
    }

}
