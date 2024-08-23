<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Packages\Domain\Order\Entity\Order as OrderEntity;
use Packages\Domain\Order\ValueObject\ID;
use Packages\Domain\Order\ValueObject\Name;
use Packages\Domain\Order\ValueObject\OrderedAt;
use Packages\Domain\Order\ValueObject\OrderStatus;
use Packages\Domain\Order\ValueObject\PhoneNumber;
use Packages\Domain\Order\ValueObject\SumMoney;
use Packages\Domain\Order\ValueObject\UpdatedOrderAt;

class Order extends Model
{
    use HasFactory;

    public const CREATED_AT = 'ordered_at';
    public const UPDATED_AT = 'updated_order_at';
	public $incrementing  = false;
	protected $keyType      = 'string';

    public $fillable = [
        'id',
        'name',
        'phone_number',
        'sum_money',
        'order_status',
    ];

    public function toEntity(): OrderEntity
    {
        return OrderEntity::create(
            ID::create($this->id),
            Name::create($this->name),
            PhoneNumber::create($this->phone_number),
            SumMoney::create($this->sum_money),
            OrderStatus::from($this->order_status),
            OrderedAt::createWithConversion($this->ordered_at),
            UpdatedOrderAt::createWithConversion($this->updated_order_at)
        );
    }

    public static function createByEntity(OrderEntity $orderEntity): Order
    {
        return self::create([
            'id'           => $orderEntity->getID()->getValue(),
            'name'         => $orderEntity->getName()->getValue(),
            'phone_number' => $orderEntity->getPhoneNumber()->getValue(),
            'sum_money'    => $orderEntity->getSumMoney()->getValue(),
            'order_status' => $orderEntity->getOrderStatus()->value,
        ]);
    }
}
