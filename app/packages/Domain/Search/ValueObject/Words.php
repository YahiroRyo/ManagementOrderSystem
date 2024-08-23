<?php

namespace Packages\Domain\Search\ValueObject;

class Words
{
    private array $value;

    private function __construct(array $value)
    {
        $this->value = $value;
    }

    public function getValue(): array
    {
        return $this->value;
    }

    public function isEmpty(): bool
    {
        return $this->value === [];
    }

    public function isExists(): bool
    {
        return !$this->isEmpty();
    }

    public static function createWithConversion(string $value): self
    {
        $explodedValue = explode(' ', $value);

        return new self($explodedValue);
    }

    public static function createEmpty(): self
    {
        return new self([]);
    }
}
