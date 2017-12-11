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

final class PartOneCommand extends Command
{
    private const INPUT_DIRECTORY = 'var/input';

    protected function configure(): void
    {
        $this
            ->setName('captcha:part-one')
            ->setDescription('Iterates over each file in the var/input and gives sum of matching digits in the string')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output): void
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Day 1 - Part 1');

        $finder = new Finder();
        $finder->files()->in(self::INPUT_DIRECTORY);

        $rows = [];

        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            $inputFile = new FileInput($file);

            $circleParser = new CircleInputParser($inputFile);
            $numericParser = new NumericInputParser($circleParser);
            $arrayParser = new ArrayInputParser($numericParser);

            $counter = new NextDigitMatchCounter($arrayParser->toArray());

            $rows[] = [$file->getBasename(), $counter->sum()];
        }

        $io->table(['File', 'Sum'], $rows);
    }
}
