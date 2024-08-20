<?php

namespace Packages\Domain\Order\ValueObject;

use Packages\Exceptions\ValueException;

class SumMoney
{
    private int $value;

    private function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public static function create(int $value): self
    {
        // 10000000を超過したらお会計不可能とする
        if ($value > 10000000) {
            throw new ValueException('10000000以上のお会計は不可能です。');
        }

        return new self($value);
    }
}
