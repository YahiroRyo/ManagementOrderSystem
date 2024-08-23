<?php

namespace Packages\Domain\Order\ValueObject;

use Packages\Exceptions\ValueException;

class Name
{
    private const LENGTH = 50;
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
        if (mb_strlen($value) > self::LENGTH) {
            throw new ValueException('異常な名前です。');
        }

        return new self($value);
    }

    public static function createEmpty(): self
    {
        return new self('');
    }
}
