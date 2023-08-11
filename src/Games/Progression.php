<?php

namespace Brain\Games\Progression;

use function Brain\Engine\getNumber;
use function Brain\Engine\runGame;

use const Brain\Engine\ROUNDS;

const INSTRUCTION = "What number is missing in the progression?\n";

function getProgression(int $size): array
{
    $firsNumber = getNumber();
    $progressionList = [];
    $step = rand(1, 10);
    for ($i = 0; $i < $size; $i++) {
        $progressionList[] = $firsNumber + $step;
        $firsNumber += $step;
    }
    return $progressionList;
}

function getQuestionString(array $progressionList, int $size, int $secretIndex): string
{
    $questionString = "";
    for ($i = 0; $i < $size; $i++) {
        if ($i !== $secretIndex) {
            $questionString .= "$progressionList[$i] ";
        } else {
            $questionString .= ".. ";
        }
    }
    return $questionString;
}

function run(): void
{
    $roundsCount = 0;
    $gameData = [];
    while ($roundsCount < ROUNDS) {
        $size = rand(5, 10);
        $progression = getProgression($size);
        $secretIndex = rand(0, $size - 1);
        $rightAnswer = $progression[$secretIndex];
        $questionString = getQuestionString($progression, $size, $secretIndex);
        $gameData[] = [$questionString, $rightAnswer];
        $roundsCount++;
    }
    runGame($gameData, INSTRUCTION);
}
