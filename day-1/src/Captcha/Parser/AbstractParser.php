<?php

declare(strict_types=1);

namespace RadnoK\AdventOfCode\Day1\Captcha\Parser;

use RadnoK\AdventOfCode\Day1\Captcha\Input\InputInterface;

abstract class AbstractParser implements InputInterface
{
    /**
     * @var InputInterface
     */
    protected $input;

    public function __construct(InputInterface $input)
    {
        $this->input = $input;
    }

    public function content(): string
    {
        return $this->input->content();
    }
}
