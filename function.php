<?php

function find_num_row($divide, $num)
{

    if ($divide % 2 == 0) {
        $num = $num / $divide;
    } else {
        $num = floor($num / $divide);
        $num = $num + 1;
    }
    return $num;
}
function test()
{
    return  "close";
}
