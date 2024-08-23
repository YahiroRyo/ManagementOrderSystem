<?php

namespace Packages\Service\Order;

use Packages\Domain\Order\Entity\Order;
use Packages\Domain\Order\ValueObject\ID;
use Packages\Domain\Order\ValueObject\OrderStatus;
use Packages\Repository\Order\OrderRepositoryInterface;

class ChangeOrderStatusService
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function execute(ID $id, OrderStatus $orderStatus): Order
    {
        $orderEntity = $this->orderRepository->selectOrder($id);

        $changedOrderEntity = $orderEntity->setOrderStatus($orderStatus);

        return $this->orderRepository->updateOrder($changedOrderEntity);
    }
}
