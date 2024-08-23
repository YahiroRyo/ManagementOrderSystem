<?php

namespace App\Http\Requests;

use Carbon\CarbonImmutable;
use Illuminate\Foundation\Http\FormRequest;
use Packages\Domain\Order\Entity\Order;
use Packages\Domain\Order\ValueObject\ID;
use Packages\Domain\Order\ValueObject\Name;
use Packages\Domain\Order\ValueObject\OrderedAt;
use Packages\Domain\Order\ValueObject\OrderStatus;
use Packages\Domain\Order\ValueObject\PhoneNumber;
use Packages\Domain\Order\ValueObject\SumMoney;
use Packages\Domain\Order\ValueObject\UpdatedOrderAt;

class ChangeStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        ];
    }

    public function toDomain(): Order
    {
        return Order::create(
            ID::create($this->id),
            Name::createEmpty(),
            PhoneNumber::createEmpty(),
            SumMoney::createEmpty(),
            OrderStatus::from($this->order_status),
            OrderedAt::create(CarbonImmutable::now()),
            UpdatedOrderAt::create(CarbonImmutable::now()),
        );
    }
}
