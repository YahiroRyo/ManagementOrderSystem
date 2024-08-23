<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeStatusRequest;
use App\Http\Requests\ShowOrdersRequest;
use Packages\Service\Order\ChangeOrderStatusService;
use Packages\Service\Order\GetOrdersService;

class OrderController extends Controller
{
    private ChangeOrderStatusService $changeOrderStatusService;
    private GetOrdersService $getOrdersService;

    public function __construct(
        ChangeOrderStatusService $changeOrderStatusService,
        GetOrdersService $getOrdersService
    ) {
        $this->changeOrderStatusService = $changeOrderStatusService;
        $this->getOrdersService         = $getOrdersService;
    }

    public function showOrders(ShowOrdersRequest $request)
    {
        $searchEntity = $request->toDomain();

        $orders = $this->getOrdersService->execute($searchEntity);

        return view('index', compact('orders'));
    }

    public function changeStatus(ChangeStatusRequest $changeStatusRequest)
    {
        $orderEntity = $changeStatusRequest->toDomain();

        $this->changeOrderStatusService->execute($orderEntity->getID(), $orderEntity->getOrderStatus());

        return redirect(route('index'));
    }
}
