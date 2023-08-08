<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Cli\greeting;
use function cli\prompt;

const ROUNDS = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function getNumber(): int
{
    return rand(MIN_NUMBER, MAX_NUMBER);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function isUserGuessCorrect(bool $isEven, string $userGuess): bool
{
    $correctAnswer = $isEven ? "yes" : "no";
    return $userGuess === $correctAnswer;
}

function run(): void
{
    $name = greeting();
    $roundCount = 0;
    echo "Answer \"yes\" if the number is even, otherwise answer \"no\".\n";
    while ($roundCount < ROUNDS) {
        $number = getNumber();
        $isEven = isEven($number);
        echo "Question: $number\n";
        $userGuess = prompt("Your answer");
        if (isUserGuessCorrect($isEven, $userGuess)) {
            echo "Correct!\n";
        } else {
            $correctAnswer = $isEven ? "yes" : "no";
            echo "'$userGuess' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $name!";
            return;
        }
        $roundCount++;
    }
    echo "Congratulations, $name!";
}
