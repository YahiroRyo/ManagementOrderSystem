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
}
