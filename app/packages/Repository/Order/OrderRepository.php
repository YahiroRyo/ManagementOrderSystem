<?php

namespace Packages\Repository\Order;

use App\Models\Order as OrderModel;
use Illuminate\Support\Collection;
use Packages\Domain\Order\Entity\Order;
use Packages\Domain\Order\ValueObject\ID;
use Packages\Domain\Search\Entity\Search;

class OrderRepository implements OrderRepositoryInterface
{
    public function selectOrders(Search $searchEntity): Collection
    {
        $query = OrderModel::query();

        if ($searchEntity->getWords()->isExists()) {
            $query = $query->whereIn('name', $searchEntity->getWords()->getValue());
        }

        return $query->get()->map(function(OrderModel $orderModel) {
            return $orderModel->toEntity();
        });
    }

    public function selectOrder(ID $id): Order
    {
        /**
         * @var OrderModel
         */
        $order = OrderModel::find($id->getValue());

        return $order->toEntity();
    }

    public function createOrder(Order $order): Order
    {
        $orderModel = OrderModel::createByEntity($order);

        return $orderModel->toEntity();
    }

    public function updateOrder(Order $order): Order
    {
        $orderModel = OrderModel::find($order->getId()->getValue());

        $orderModel->update([
            'name'         => $order->getName()->getValue(),
            'phone_number' => $order->getPhoneNumber()->getValue(),
            'sum_money'    => $order->getSumMoney()->getValue(),
            'order_status' => $order->getOrderStatus()->value,
        ]);

        return $order;
    }
}
