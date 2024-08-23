@php
    use Packages\Domain\Order\ValueObject\OrderStatus;
@endphp

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注文管理システム</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">注文管理システム</h1>

        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>氏名</th>
                    <th>電話番号</th>
                    <th>合計金額</th>
                    <th>注文日時</th>
                    <th>更新日時</th>
                    <th>注文ステータス</th>
                    <th>アクション</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->getId()->getValue() }}</td>
                    <td>{{ $order->getName()->getValue() }}</td>
                    <td>{{ $order->getPhoneNumber()->getValue() }}</td>
                    <td>{{ $order->getSumMoney()->getValue() }}</td>
                    <td>{{ $order->getOrderedAt()->getValue() }}</td>
                    <td>{{ $order->getUpdatedOrderAt()->getValue() }}</td>
                    <td>
                        <span class="badge
                            @if($order->getOrderStatus()->isReceived()) bg-primary
                            @elseif($order->getOrderStatus()->isDelivering()) bg-warning
                            @elseif($order->getOrderStatus()->isDelivered()) bg-success
                            @elseif($order->getOrderStatus()->isCanceling()) bg-info
                            @elseif($order->getOrderStatus()->isCanceled()) bg-secondary
                            @endif">
                            {{ $order->getOrderStatus()->toJa() }}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#statusModal" data-order-id="{{ $order->getId()->getValue() }}" data-order-status="{{ $order->getOrderStatus()->value }}">ステータス変更</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">ステータス変更</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('changeStatus') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="modalOrderId">
                        <div class="mb-3">
                            <label for="orderStatus" class="form-label">新しいステータスを選択してください</label>
                            <select class="form-select" name="order_status" id="orderStatus">
                                <option value={{ OrderStatus::RECEIVED->value }}>{{ OrderStatus::RECEIVED->toJa() }}</option>
                                <option value={{ OrderStatus::DELIVERING->value }}>{{ OrderStatus::DELIVERING->toJa() }}</option>
                                <option value={{ OrderStatus::DELIVERED->value }}>{{ OrderStatus::DELIVERED->toJa() }}</option>
                                <option value={{ OrderStatus::CANCELED->value }}>{{ OrderStatus::CANCELED->toJa() }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                        <button type="submit" class="btn btn-primary">ステータスを変更する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const statusModal = document.getElementById('statusModal')
        statusModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget
            const orderId = button.getAttribute('data-order-id')
            const orderStatus = button.getAttribute('data-order-status')

            const modalOrderIdInput = document.getElementById('modalOrderId')
            const modalOrderStatusSelect = document.getElementById('orderStatus')

            modalOrderIdInput.value = orderId
            modalOrderStatusSelect.value = orderStatus
        })
    </script>
</body>
</html>
