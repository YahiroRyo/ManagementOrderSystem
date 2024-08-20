<?php

namespace Packages\Domain\Order\Entity;

use Packages\Domain\Order\ValueObject\ID;
use Packages\Domain\Order\ValueObject\Name;
use Packages\Domain\Order\ValueObject\OrderedAt;
use Packages\Domain\Order\ValueObject\OrderStatus;
use Packages\Domain\Order\ValueObject\PhoneNumber;
use Packages\Domain\Order\ValueObject\SumMoney;
use Packages\Domain\Order\ValueObject\UpdatedOrderAt;

class Order
{
    private ID $id;
    private Name $name;
    private PhoneNumber $phoneNumber;
    private SumMoney $sumMoney;
    private OrderStatus $orderStatus;
    private OrderedAt $orderedAt;
    private UpdatedOrderAt $updatedOrderAt;

    private function __construct(
        ID $id,
        Name $name,
        PhoneNumber $phoneNumber,
        SumMoney $sumMoney,
        OrderStatus $orderStatus,
        OrderedAt $orderedAt,
        UpdatedOrderAt $updatedOrderAt
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
        $this->sumMoney = $sumMoney;
        $this->orderStatus = $orderStatus;
        $this->orderedAt = $orderedAt;
        $this->updatedOrderAt = $updatedOrderAt;
    }

    public function getID(): ID
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getPhoneNumber(): PhoneNumber
    {
        return $this->phoneNumber;
    }

    public function getSumMoney(): SumMoney
    {
        return $this->sumMoney;
    }

    public function getOrderStatus(): OrderStatus
    {
        return $this->orderStatus;
    }

    public function getOrderedAt(): OrderedAt
    {
        return $this->orderedAt;
    }

    public function getUpdatedOrderAt(): UpdatedOrderAt
    {
        return $this->updatedOrderAt;
    }
}
