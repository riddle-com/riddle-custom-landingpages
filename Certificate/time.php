<?php

$time = 127427;

$totalSeconds = $time / 1000;
$hours = floor($totalSeconds / 60 / 60);
$minutes = floor($totalSeconds / 60 - $hours * 60);
$seconds = floor($totalSeconds - $minutes * 60);

$stringHours = str_pad($hours, 2, '0', STR_PAD_LEFT);
$stringMinutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);
$stringSeconds = str_pad($seconds, 2, '0', STR_PAD_LEFT);
$stringTime = $stringHours . ':' . $stringMinutes . ':' . $stringSeconds;

var_dump($stringTime);