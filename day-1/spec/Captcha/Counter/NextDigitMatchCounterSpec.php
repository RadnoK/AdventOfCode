<?php

declare(strict_types=1);

namespace spec\RadnoK\AdventOfCode\Day1\Captcha\Counter;

use PhpSpec\ObjectBehavior;
use RadnoK\AdventOfCode\Day1\Captcha\Counter\CounterInterface;
use RadnoK\AdventOfCode\Day1\Captcha\Counter\NextDigitMatchCounter;
use RadnoK\AdventOfCode\Day1\Captcha\Input\InputInterface;
use RadnoK\AdventOfCode\Day1\Captcha\Parser\ArrayInputParser;
use RadnoK\AdventOfCode\Day1\Captcha\Parser\CircleInputParser;

final class NextDigitMatchCounterSpec extends ObjectBehavior
{
    function let(): void
    {
        $this->beConstructedWith([]);
    }

    function it_is_a_counter(): void
    {
        $this->shouldImplement(CounterInterface::class);
    }

    function it_is_a_next_digit_match_counter(): void
    {
        $this->shouldHaveType(NextDigitMatchCounter::class);
    }

    function it_should_return_3_when_1122_given(): void
    {
        $this->beConstructedWith(str_split('11221'));
        $this->sum()->shouldReturn(3);
    }

    function it_will_return_4_when_1111_given(): void
    {
        $this->beConstructedWith(str_split('11111'));
        $this->sum()->shouldReturn(4);
    }

    function it_should_return_0_when_1234_given(): void
    {
        $this->beConstructedWith(str_split('12341'));
        $this->sum()->shouldReturn(0);
    }

    function it_should_return_9_when_91212129_given(): void
    {
        $this->beConstructedWith(str_split('912121299'));
        $this->sum()->shouldReturn(9);
    }

    function it_should_return_6_when_31233123_given(): void
    {
        $this->beConstructedWith(str_split('312331233'));
        $this->sum()->shouldReturn(6);
    }
}
