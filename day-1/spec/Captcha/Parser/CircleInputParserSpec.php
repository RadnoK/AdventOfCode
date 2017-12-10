<?php

declare(strict_types=1);

namespace spec\RadnoK\AdventOfCode\Day1\Captcha\Parser;

use PhpSpec\ObjectBehavior;
use RadnoK\AdventOfCode\Day1\Captcha\Input\InputInterface;
use RadnoK\AdventOfCode\Day1\Captcha\Parser\CircleInputParser;

final class CircleInputParserSpec extends ObjectBehavior
{
    function let(InputInterface $input): void
    {
        $this->beConstructedWith($input);
    }

    function it_is_a_circle_input_parser(): void
    {
        $this->shouldHaveType(CircleInputParser::class);
    }

    function it_returns_circled_string(InputInterface $input): void
    {
        $input->content()->willReturn('123');

        $this->beConstructedWith($input);
        $this->circled()->shouldReturn('1231');
    }
}
