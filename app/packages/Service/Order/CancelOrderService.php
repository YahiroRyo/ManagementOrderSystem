<?php

namespace Packages\Service\Order;

use Packages\Domain\Order\Entity\Order;
use Packages\Domain\Order\ValueObject\ID;
use Packages\Domain\Order\ValueObject\OrderStatus;
use Packages\Repository\Order\OrderRepositoryInterface;

class CancelOrderService
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function execute(ID $id): Order
    {
        $orderEntity = $this->orderRepository->selectOrder($id);
        $changedOrderEntity = $orderEntity->setOrderStatus(OrderStatus::CANCELING);

        return $this->orderRepository->updateOrder($changedOrderEntity);
    }
}
