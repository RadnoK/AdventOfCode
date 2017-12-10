<?php

declare(strict_types=1);

namespace spec\RadnoK\AdventOfCode\Day1\Captcha\Parser;

use PhpSpec\ObjectBehavior;
use RadnoK\AdventOfCode\Day1\Captcha\Input\InputInterface;
use RadnoK\AdventOfCode\Day1\Captcha\Parser\ArrayInputParser;

final class ArrayInputParserSpec extends ObjectBehavior
{
    function let(InputInterface $input): void
    {
        $this->beConstructedWith($input);
    }

    function it_is_an_array_input_parser(): void
    {
        $this->shouldHaveType(ArrayInputParser::class);
    }

    function it_returns_array_from_input_content(InputInterface $input): void
    {
        $input->content()->willReturn('123');

        $this->beConstructedWith($input);
        $this->toArray()->shouldReturn(['1', '2', '3']);
    }
}
