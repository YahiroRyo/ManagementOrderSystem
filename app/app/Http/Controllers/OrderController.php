<?php

namespace App\Http\Controllers;

use Packages\Service\Order\CancelOrderService;
use Packages\Service\Order\OrderService;
use Packages\Service\Order\ChangeOrderStatusService;
use Packages\Service\Order\GetOrderService;
use Packages\Service\Order\GetOrdersService;

class OrderController extends Controller
{

    private OrderService $orderService;
    private CancelOrderService $cancelOrderService;
    private ChangeOrderStatusService $changeOrderStatusService;
    private GetOrdersService $getOrdersService;
    private GetOrderService $getOrderService;

    public function showOrders()
    {
        $this->getOrdersService->execute();
    }
}
