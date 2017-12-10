<?php

declare(strict_types=1);

namespace RadnoK\AdventOfCode\Day1\Captcha\Parser;

use RadnoK\AdventOfCode\Day1\Captcha\Parser\AbstractParser;

final class CircleInputParser extends AbstractParser
{
    public function circled(): string
    {
        $fileContent = $this->content();

        return $fileContent . $fileContent[0];
    }
}
