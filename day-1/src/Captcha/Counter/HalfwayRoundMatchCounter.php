<?php

declare(strict_types=1);

namespace RadnoK\AdventOfCode\Day1\Captcha\Counter;

final class HalfwayRoundMatchCounter implements CounterInterface
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

        $dividedCount = (count($this->countable) / 2);

        foreach ($this->countable as $key => $char) {
            if ($key >= $dividedCount) {
                break;
            }

            $currentDigit = (int) $char;
            $relatedDigit = (int) $this->countable[$key + $dividedCount];

            if ($relatedDigit === $currentDigit) {
                $sum += $currentDigit + $relatedDigit;
            }
        }

        return $sum;
    }
}
