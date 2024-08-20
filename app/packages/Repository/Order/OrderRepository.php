<?php

namespace Packages\Repository\Order;

use Illuminate\Database\Eloquent\Collection;
use Packages\Domain\Order\Entity\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function selectOrders(): Collection
    {
        return new Collection();
    }

    public function selectOrder(): Collection
    {
        return new Collection();
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
