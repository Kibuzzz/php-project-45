<?php

namespace Brain\Games\Prime;

use function Brain\Engine\runGame;
use function Brain\Engine\getNumber;

use const Brain\Engine\ROUNDS;

const INSTRUCTION = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n";


function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    $sqrt = floor(sqrt($number)) + 1;
    for ($i = 2; $i < $sqrt; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function run(): void
{
    $roundsCount = 0;
    $gameData = [];
    while ($roundsCount < ROUNDS) {
        $qustionNumber = getNumber();
        $rightAnswer = isPrime($qustionNumber) ? "yes" : "no";
        $gameData[] = [$qustionNumber, $rightAnswer];
        $roundsCount++;
    }
    runGame($gameData, INSTRUCTION);
}
