<?php

namespace Packages\Domain\Order\ValueObject;

enum OrderStatus: string
{
    case RECEIVED = 'RECEIVED';
    case DELIVERING = 'DELIVERING';
    case DELIVERED = 'DELIVERED';
    case CANCELING = 'CANCELING';
    case CANCELED = 'CANCELED';

    public function toJa()
    {
        return match($this) {
            self::RECEIVED   => '受付中',
            self::DELIVERING => '配送中',
            self::DELIVERED  => '配送済み',
            self::CANCELING  => 'キャンセル受付中',
            self::CANCELED   => 'キャンセル済み',
        };
    }

    public function isReceived(): bool
    {
        return $this === self::RECEIVED;
    }

    public function isDelivering(): bool
    {
        return $this === self::DELIVERING;
    }

    public function isDelivered(): bool
    {
        return $this === self::DELIVERED;
    }

    public function isCanceling(): bool
    {
        return $this === self::CANCELING;
    }

    public function isCanceled(): bool
    {
        return $this === self::CANCELED;
    }
}
