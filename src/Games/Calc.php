<?php

namespace Brain\Games\Cacl;

use function Brain\Engine\runGame;
use function Brain\Engine\getNumber;

use const Brain\Engine\ROUNDS;

const INSTRUCTION = "What is the result of the expression?\n";

function calculateAnswer(int $questionNumber1, int $questionNumber2, string $questionOperator): int
{
    $result = 0;
    switch ($questionOperator) {
        case "+":
            $result = $questionNumber1 + $questionNumber2;
            break;
        case "-":
            $result = $questionNumber1 - $questionNumber2;
            break;
        case "*":
            $result = $questionNumber1 * $questionNumber2;
            break;
    }
    return $result;
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
