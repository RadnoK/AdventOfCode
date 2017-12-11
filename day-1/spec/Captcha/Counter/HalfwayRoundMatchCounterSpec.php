<?php

declare(strict_types=1);

namespace spec\RadnoK\AdventOfCode\Day1\Captcha\Counter;

use PhpSpec\ObjectBehavior;
use RadnoK\AdventOfCode\Day1\Captcha\Counter\CounterInterface;
use RadnoK\AdventOfCode\Day1\Captcha\Counter\HalfwayRoundMatchCounter;

final class HalfwayRoundMatchCounterSpec extends ObjectBehavior
{
    function let(): void
    {
        $this->beConstructedWith([]);
    }

    function it_is_a_halfway_round_match_counter(): void
    {
        $this->shouldHaveType(HalfwayRoundMatchCounter::class);
    }

    function it_implements_counter(): void
    {
        $this->shouldImplement(CounterInterface::class);
    }

    function it_returns_6_when_1212_given(): void
    {
        $this->beConstructedWith(str_split('1212'));
        $this->sum()->shouldReturn(6);
    }

    function it_returns_0_when_1221_given(): void
    {
        $this->beConstructedWith(str_split('1221'));
        $this->sum()->shouldReturn(0);
    }

    function it_returns_4_when_123425_given(): void
    {
        $this->beConstructedWith(str_split('123425'));
        $this->sum()->shouldReturn(4);
    }

    function it_returns_12_when_123123_given(): void
    {
        $this->beConstructedWith(str_split('123123'));
        $this->sum()->shouldReturn(12);
    }

    function it_returns_4_when_12131415_given(): void
    {
        $this->beConstructedWith(str_split('12131415'));
        $this->sum()->shouldReturn(4);
    }
}
