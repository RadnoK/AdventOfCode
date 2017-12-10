<?php

declare(strict_types=1);

namespace spec\RadnoK\AdventOfCode\Day1\Captcha\Parser;

use PhpSpec\ObjectBehavior;
use RadnoK\AdventOfCode\Day1\Captcha\Exception\NotNumericInputException;
use RadnoK\AdventOfCode\Day1\Captcha\Input\InputInterface;
use RadnoK\AdventOfCode\Day1\Captcha\Parser\NumericInputParser;

final class NumericInputParserSpec extends ObjectBehavior
{
    function let(InputInterface $input): void
    {
        $this->beConstructedWith($input);
    }

    function it_is_a_numeric_input_parser(): void
    {
        $this->shouldHaveType(NumericInputParser::class);
    }

    function it_returns_numeric_string_when_file_has_numeric_content(InputInterface $input): void
    {
        $input->content()->willReturn('123123');

        $this->beConstructedWith($input);
        $this->content()->shouldReturn('123123');
    }

    function it_throws_an_exception_when_input_content_is_not_numeric(InputInterface $input): void
    {
        $input->content()->willReturn('123asdasd');

        $this->beConstructedWith($input);
        $this->shouldThrow(NotNumericInputException::class)->during('content');
    }
}
