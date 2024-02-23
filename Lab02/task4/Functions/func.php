<?php

function my_sin($x)
{
    return sin($x);
}

function my_cos($x)
{
    return cos($x);
}

function my_tg($x)
{
    return sin($x) / cos($x);
}

function factorial($n)
{
    if ($n === 0) {
        return 1;
    }
    $result = 1;
    for ($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }
    return $result;
}

function my_pow($x, $y)
{
    return pow($x, $y);
}
