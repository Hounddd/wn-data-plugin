<?php

namespace Hounddd\Data\Tests\Fakes;

use Spatie\LaravelData\Data;

class SimpleData extends Data
{
    public function __construct(
        public string $string
    ) {
    }

    public static function fromString(string $string): self
    {
        return new self($string);
    }
}
