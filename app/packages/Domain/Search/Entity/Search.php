<?php

namespace Packages\Domain\Search\Entity;

use Words;

class Search
{
    private Words $words;

    private function __construct(Words $words)
    {
        $this->words = $words;
    }

    public function getWords(): Words
    {
        return $this->words;
    }

    public static function create(Words $words): self
    {
        return new self($words);
    }
}
