<?php

declare(strict_types=1);

namespace RadnoK\AdventOfCode\Day1\Captcha\Parser;

final class ArrayInputParser extends AbstractParser
{
    public function toArray(): array
    {
        return str_split($this->content());
    }
}
