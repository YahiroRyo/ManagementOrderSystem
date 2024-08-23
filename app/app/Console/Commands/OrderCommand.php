<?php

namespace App\Console\Commands;

use Carbon\CarbonImmutable;
use Illuminate\Console\Command;
use Packages\Domain\Order\Entity\Order;
use Packages\Domain\Order\ValueObject\ID;
use Packages\Domain\Order\ValueObject\Name;
use Packages\Domain\Order\ValueObject\OrderedAt;
use Packages\Domain\Order\ValueObject\OrderStatus;
use Packages\Domain\Order\ValueObject\PhoneNumber;
use Packages\Domain\Order\ValueObject\SumMoney;
use Packages\Domain\Order\ValueObject\UpdatedOrderAt;
use Packages\Repository\Order\OrderRepository;
use Packages\Service\Order\CreateOrderService;

class OrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-order {name} {phoneNumber} {sumMoney}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create order';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orderRepositroy = new OrderRepository();
        $orderService = new CreateOrderService($orderRepositroy);

        $name        = $this->argument('name');
        $phoneNumber = $this->argument('phoneNumber');
        $sumMoney    = intval($this->argument('sumMoney'));

        $order = Order::create(
            ID::generateRandomIDAndCreate(),
            Name::create($name),
            PhoneNumber::create($phoneNumber),
            SumMoney::create($sumMoney),
            OrderStatus::RECEIVED,
            OrderedAt::create(CarbonImmutable::now()),
            UpdatedOrderAt::create(CarbonImmutable::now()),
        );

        $orderService->execute($order);
    }
}
