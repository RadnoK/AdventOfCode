<?php

declare(strict_types=1);

namespace RadnoK\AdventOfCode\Day1\Captcha\Counter;

final class NextDigitMatchCounter implements CounterInterface
{
    /**
     * @var array
     */
    private $countable;

    public function __construct(array $countable)
    {
        $this->countable = $countable;
    }

    public function sum(): int
    {
        $sum = 0;

        $lastDigit = null;

        foreach ($this->countable as $char) {
            $currentDigit = (int) $char;

            if ($currentDigit === $lastDigit) {
                $sum += $currentDigit;
            }

            $lastDigit = $currentDigit;
        }

        return $sum;
    }
}
