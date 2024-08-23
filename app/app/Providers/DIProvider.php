<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\Repository\Order\OrderRepository;
use Packages\Repository\Order\OrderRepositoryInterface;

class DIProvider extends ServiceProvider
{
    private $repositories = [
        OrderRepositoryInterface::class => OrderRepository::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        foreach ($this->repositories as $repository => $impl) {
            $this->app->bind($repository, function() use ($impl) {
                return new $impl();
            });
        }
    }
}
