<?php

declare(strict_types=1);

namespace RadnoK\AdventOfCode\Day1\Console;

use RadnoK\AdventOfCode\Day1\Captcha\Counter\NextDigitMatchCounter;
use RadnoK\AdventOfCode\Day1\Captcha\Input\FileInput;
use RadnoK\AdventOfCode\Day1\Captcha\Parser\ArrayInputParser;
use RadnoK\AdventOfCode\Day1\Captcha\Parser\CircleInputParser;
use RadnoK\AdventOfCode\Day1\Captcha\Parser\NumericInputParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

final class CaptchaGateway extends Command
{
    private const INPUT_DIRECTORY = 'var/input';

    protected function configure(): void
    {
        $this
            ->setName('captcha:solve')
            ->setDescription('Iterates over each file in the var/input and gives sum of matching digits in the string')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output): void
    {
        $io = new SymfonyStyle($input, $output);

        $finder = new Finder();
        $finder->files()->in(self::INPUT_DIRECTORY);

        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            $inputFile = new FileInput($file);

            $circleParser = new CircleInputParser($inputFile);
            $numericParser = new NumericInputParser($circleParser);
            $arrayParser = new ArrayInputParser($numericParser);

            $counter = new NextDigitMatchCounter($arrayParser->toArray());

            $io->write(sprintf("Sum for %s is: %d", $file->getRelativePath(), $counter->sum()));
        }
    }
}
