<?php

namespace Packages\Repository\Order;

use Packages\Domain\Order\Entity\Order;
use Illuminate\Support\Collection;
use Packages\Domain\Order\ValueObject\ID;
use Packages\Domain\Search\Entity\Search;

interface OrderRepositoryInterface
{
    public function selectOrders(Search $searchEntity): Collection;

    public function selectOrder(ID $id): Order;

    public function createOrder(Order $order): Order;

    public function updateOrder(Order $order): Order;
}
