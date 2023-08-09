<?php

namespace Brain\Games\Even;

use const Brain\Engine\ROUNDS;
use function Brain\Functions\getRandomNumber\getNumber;

function getInstruction(): string
{
    return "Answer \"yes\" if the number is even, otherwise answer \"no\".\n";
}

function isEven(int $number): string
{
    return $number % 2 === 0 ? "yes" : "no";
}

function generateGameData(): array
{
    $roundCount = 0;
    $gameData = [];
    while ($roundCount < 3) {
        $questionNumber = getNumber();
        $rightAnswer = isEven($questionNumber);
        $gameData[] = [$questionNumber, $rightAnswer];
        $roundCount++;
    }
    return $gameData;
}
