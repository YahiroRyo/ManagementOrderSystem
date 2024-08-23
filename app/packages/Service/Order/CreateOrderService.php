<?php

namespace Packages\Service\Order;

use Packages\Domain\Order\Entity\Order;
use Packages\Repository\Order\OrderRepositoryInterface;

class CreateOrderService
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function execute(Order $orderEntity): Order
    {
        return $this->orderRepository->createOrder($orderEntity);
    }
}
