<?php

namespace Brain\Games\Even;

use function Brain\Engine\getNumber;
use function Brain\Engine\runGame;

use const Brain\Engine\ROUNDS;

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
