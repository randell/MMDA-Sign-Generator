<?php

function time_elapsed($stamp)
{
    $now = time();
    $time_elapsed = $now - strtotime($stamp);

    if ($time_elapsed < Constants::TIME_HOUR)
    {
        $time_elapsed = (int)($time_elapsed/Constants::TIME_MINUTE) . " minutes";
    }
    elseif ($time_elapsed < Constants::TIME_DAY)
    {
        $time_elapsed = (int)($time_elapsed/Constants::TIME_HOUR) . " hours";
    }
    elseif ($time_elapsed < Constants::TIME_YEAR)
    {
        $time_elapsed = (int)($time_elapsed/Constants::TIME_DAY) . " days";
    }
    else
    {
        $time_elapsed = "A long time";
    }
    
    $time_elapsed .= " ago";

    return $time_elapsed;
}

/* File util_helper.php*/
/* Location ./system/application/helpers/util_helper.php */