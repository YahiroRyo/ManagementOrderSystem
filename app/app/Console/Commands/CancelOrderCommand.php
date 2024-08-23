<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Packages\Domain\Order\ValueObject\ID;
use Packages\Repository\Order\OrderRepository;
use Packages\Service\Order\CancelOrderService;

class CancelOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cancel-order {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel order';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orderRepositroy = new OrderRepository();
        $cancelOrderService = new CancelOrderService($orderRepositroy);

        $id = $this->argument('id');

        $cancelOrderService->execute(ID::create($id));
    }
}
