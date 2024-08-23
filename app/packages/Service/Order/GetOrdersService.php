<?php

namespace Packages\Service\Order;

use Illuminate\Support\Collection;
use Packages\Domain\Search\Entity\Search;
use Packages\Repository\Order\OrderRepositoryInterface;

class GetOrdersService
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function execute(Search $searchEntity): Collection
    {
        return $this->orderRepository->selectOrders($searchEntity);
    }
}
