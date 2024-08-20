<?php

namespace Packages\Repository\Order;

use Packages\Domain\Order\Entity\Order;
use Illuminate\Database\Eloquent\Collection;

interface OrderRepositoryInterface
{
    public function selectOrders(): Collection;

    public function selectOrder(): Collection;

    public function createOrder(Order $order): Order;

    public function updateOrder(Order $order): Order;
}
