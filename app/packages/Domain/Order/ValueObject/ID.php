<?php

namespace Packages\Domain\Order\ValueObject;

use Illuminate\Support\Str;
use Packages\Exceptions\ValueException;

class ID
{
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public static function generateRandomIDAndCreate(): self
    {
        return new self(Str::uuid());
    }

    public static function create(string $value): self
    {
        if (!Str::isUuid($value)) {
            throw new ValueException('異常なIDです。');
        }

        return new self($value);
    }
}
