<?php

namespace Brain\Games\Gcd;

use function Brain\Engine\getNumber;
use function Brain\Engine\runGame;

use const Brain\Engine\ROUNDS;

const INSTRUCTION = "Find the greatest common divisor of given numbers.\n";

function run(): void
{
    $roundCount = 0;
    $gameData = [];
    while ($roundCount < ROUNDS) {
        $guessNumber1 = getNumber();
        $guessNumber2 = getNumber();
        $questionString = "$guessNumber1 $guessNumber2";
        $rightAnswer = gmp_gcd($guessNumber1, $guessNumber2);
        $gameData[] = [$questionString, $rightAnswer];
        $roundCount++;
    }
    runGame($gameData, INSTRUCTION);
}
