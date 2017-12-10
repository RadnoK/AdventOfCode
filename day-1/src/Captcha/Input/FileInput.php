<?php

declare(strict_types=1);

namespace RadnoK\AdventOfCode\Day1\Captcha\Input;

use RadnoK\AdventOfCode\Day1\Captcha\Exception\EmptyInputException;
use Symfony\Component\Finder\SplFileInfo;

final class FileInput implements InputInterface
{
    /**
     * @var SplFileInfo
     */
    private $file;

    public function __construct(SplFileInfo $file)
    {
        $this->file = $file;
    }

    public function content(): string
    {
        $fileContent = $this->file->getContents();

        if (empty($fileContent)) {
            throw new EmptyInputException('Input file should have a content.');
        }

        return $fileContent;
    }
}
