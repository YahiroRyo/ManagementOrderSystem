<?php

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
