<?php

namespace Brain\Engine;

use function Brain\Cli\greeting;
use function cli\prompt;

const ROUNDS = 3;

function runGame(array $gameData, string $instruction)
{
    $name = greeting();
    echo $instruction;
    $roundCount = 0;
    while ($roundCount < ROUNDS) {
        echo "Question: {$gameData[$roundCount][0]}\n";
        $userGuess = prompt("Your answer");
        $correctAnswer = $gameData[$roundCount][1];
        if ($userGuess != $correctAnswer) {
            echo "'$userGuess' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $name!";
            return;
        }
        echo "Correct!\n";
        $roundCount++;
    }
}
