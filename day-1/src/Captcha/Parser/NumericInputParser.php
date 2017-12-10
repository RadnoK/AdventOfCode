<?php

declare(strict_types=1);

namespace RadnoK\AdventOfCode\Day1\Captcha\Parser;

use RadnoK\AdventOfCode\Day1\Captcha\Exception\NotNumericInputException;

final class NumericInputParser extends AbstractParser
{
    public function content(): string
    {
        $fileContent = parent::content();

        if (!is_numeric($fileContent)) {
            throw new NotNumericInputException('File should have only numeric content');
        }

        return $fileContent;
    }
}
