<?php

namespace Packages\Domain\Order\ValueObject;

use Carbon\CarbonImmutable;
use Packages\Exceptions\ValueException;
use Throwable;

class UpdatedOrderAt
{
    private CarbonImmutable $value;

    private function __construct(CarbonImmutable $value)
    {
        $this->value = $value;
    }

    public function getValue(): CarbonImmutable
    {
        return $this->value;
    }

    public static function createWithConversion(string $value): self
    {
        try {
            $convertedValue = new CarbonImmutable($value);
        } catch (Throwable $e) {
            throw new ValueException('異常な注文更新日時です。');
        }

        return new self($convertedValue);
    }

    public static function create(CarbonImmutable $value): self
    {
        return new self($value);
    }
}
