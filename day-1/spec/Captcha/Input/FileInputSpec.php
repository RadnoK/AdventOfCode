<?php

declare(strict_types=1);

namespace spec\RadnoK\AdventOfCode\Day1\Captcha\Input;

use PhpSpec\ObjectBehavior;
use RadnoK\AdventOfCode\Day1\Captcha\Exception\EmptyInputException;
use RadnoK\AdventOfCode\Day1\Captcha\Input\InputInterface;
use Symfony\Component\Finder\SplFileInfo;

final class FileInputSpec extends ObjectBehavior
{
    function let(SplFileInfo $file): void
    {
        $this->beConstructedWith($file);
    }

    function it_is_an_input(): void
    {
        $this->shouldImplement(InputInterface::class);
    }

    function it_throws_an_exception_when_file_is_empty(SplFileInfo $file): void
    {
        $file->beConstructedWith(['test_input', 'var/input', '/var/input']);
        $file->getContents()->willReturn('');

        $this->beConstructedWith($file);
        $this->shouldThrow(EmptyInputException::class)->during('content');
    }

    function it_returns_file_content(SplFileInfo $file): void
    {
        $file->beConstructedWith(['test_input', 'var/input', '/var/input']);
        $file->getContents()->willReturn('123123123');

        $this->beConstructedWith($file);
        $this->content()->shouldReturn('123123123');
    }
}
