<?php

namespace Packages\Service\Order;

use Packages\Domain\Order\Entity\Order;
use Packages\Domain\Order\ValueObject\ID;
use Packages\Repository\Order\OrderRepositoryInterface;

class GetOrderService
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function execute(ID $id): Order
    {
        $orderEntity = $this->orderRepository->selectOrder($id);

        return $orderEntity;
    }
}
