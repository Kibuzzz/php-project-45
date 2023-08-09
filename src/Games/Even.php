<?php

namespace Brain\Games\Even;

use const Brain\Engine\ROUNDS;
use function Brain\Functions\getRandomNumber\getNumber;
use function Brain\Engine\runGame;

const INSTRUCTION = "Answer \"yes\" if the number is even, otherwise answer \"no\".\n";

function isEven(int $number): string
{
    return $number % 2 === 0 ? "yes" : "no";
}

function run(): void
{
    $roundCount = 0;
    $gameData = [];
    while ($roundCount < ROUNDS) {
        $questionNumber = getNumber();
        $rightAnswer = isEven($questionNumber);
        $gameData[] = [$questionNumber, $rightAnswer];
        $roundCount++;
    }
    runGame($gameData, INSTRUCTION);
}
