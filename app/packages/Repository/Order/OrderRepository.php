<?php

namespace Packages\Repository\Order;

use App\Models\Order as OrderModel;
use Illuminate\Database\Eloquent\Collection;
use Packages\Domain\Order\Entity\Order;
use Packages\Domain\Order\ValueObject\ID;
use Packages\Domain\Search\Entity\Search;

class OrderRepository implements OrderRepositoryInterface
{
    public function selectOrders(?Search $searchEntity): Collection
    {
        $query = OrderModel::query();

        if (isset($searchEntity)) {
            $query = $query->whereIn('name', $searchEntity->getWords());
        }

        return $query->get()->map(function(OrderModel $orderModel) {
            return $orderModel->toEntity();
        });;
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
        return $order;
    }
}
