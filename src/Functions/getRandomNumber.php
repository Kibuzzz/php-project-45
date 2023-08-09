<?php

namespace Brain\Functions\getRandomNumber;

const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function getNumber(): int
{
    return rand(MIN_NUMBER, MAX_NUMBER);
}
