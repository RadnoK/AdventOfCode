<?php

declare(strict_types=1);

namespace RadnoK\AdventOfCode\Day1\Captcha\Parser;

final class CircleInputParser extends AbstractParser
{
    public function content(): string
    {
        $fileContent = parent::content();

        return $fileContent . $fileContent[0];
    }
}
