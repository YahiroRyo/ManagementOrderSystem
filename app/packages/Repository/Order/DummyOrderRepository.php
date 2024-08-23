<?php

namespace Packages\Repository\Order;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Collection;
use Packages\Domain\Order\Entity\Order;
use Packages\Domain\Search\Entity\Search;
use Packages\Domain\Order\ValueObject\ID;
use Packages\Domain\Order\ValueObject\Name;
use Packages\Domain\Order\ValueObject\OrderedAt;
use Packages\Domain\Order\ValueObject\OrderStatus;
use Packages\Domain\Order\ValueObject\PhoneNumber;
use Packages\Domain\Order\ValueObject\SumMoney;
use Packages\Domain\Order\ValueObject\UpdatedOrderAt;

class DummyOrderRepository implements OrderRepositoryInterface
{
    public function selectOrders(?Search $searchEntity): Collection
    {
        return new Collection();
    }

    public function selectOrder(ID $id): Order
    {
        $order = Order::create(
            ID::generateRandomIDAndCreate(),
            Name::create('テスト太郎'),
            PhoneNumber::create('123-4567-8910'),
            SumMoney::create(500),
            OrderStatus::DELIVERED,
            OrderedAt::create(CarbonImmutable::now()),
            UpdatedOrderAt::create(CarbonImmutable::now()),
        );

        return $order;
    }

    public function createOrder(Order $order): Order
    {
        return $order;
    }

    public function updateOrder(Order $order): Order
    {
        return $order;
    }
}
