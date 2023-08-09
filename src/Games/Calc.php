<?php

namespace Brain\Games\Cacl;

use function Brain\Engine\runGame;
use function Brain\Functions\getRandomNumber\getNumber;

use const Brain\Engine\ROUNDS;

const INSTRUCTION = "What is the result of the expression?\n";

function calculateAnswer(int $questionNumber1, int $questionNumber2, string $questionOperator): string
{
    return match ($questionOperator) {
        "+" => $questionNumber1 + $questionNumber2,
        "-" => $questionNumber1 - $questionNumber2,
        "*" => $questionNumber1 * $questionNumber2,
    };
}

function run()
{
    $roundCount = 0;
    $gameData = [];
    $operators = ["+", "-", "*"];
    while ($roundCount < ROUNDS) {
        $questionNumber1 = getNumber();
        $questionNumber2 = getNumber();
        $questionOperator = $operators[$questionNumber1 % 3];
        $questionString = "{$questionNumber1} {$questionOperator} {$questionNumber2}";
        $rightAnswer = calculateAnswer($questionNumber1, $questionNumber2, $questionOperator);
        $gameData[] = [$questionString, $rightAnswer];
        $roundCount++;
    }
    runGame($gameData, INSTRUCTION);
}
