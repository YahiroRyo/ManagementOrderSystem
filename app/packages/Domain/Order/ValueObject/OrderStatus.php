<?php

namespace Packages\Domain\Order\ValueObject;

enum OrderStatus
{
    case RECEIVED;
    case DELIVERING;
    case DELIVERED;
    case CANCELING;
    case CANCELED;

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
