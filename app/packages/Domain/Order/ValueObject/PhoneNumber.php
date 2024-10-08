<?php

namespace Packages\Domain\Order\ValueObject;

use Packages\Exceptions\ValueException;

class PhoneNumber
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

    public static function create(string $value): self
    {
        if (preg_match('/^[0-9]{10}+$/', $value)) {
            return new self($value);
        }

        throw new ValueException('異常な電話番号です。');
    }

    public static function createEmpty(): self
    {
        return new self('');
    }
}
