<?php

declare(strict_types=1);

namespace spec\RadnoK\AdventOfCode\Day1\Console;

use RadnoK\AdventOfCode\Day1\Console\CaptchaGateway;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

final class CaptchaGatewaySpec extends ObjectBehavior
{
    function it_is_a_captcha_gateway_command(): void
    {
        $this->shouldHaveType(CaptchaGateway::class);
    }
}
