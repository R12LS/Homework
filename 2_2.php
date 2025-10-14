<?php
$cels = 12;

$fahrenheit = round($cels * 9 / 5 + 32, 2);
$kelvin = round($cels + 273.15, 2);

echo "Цельсий: {$cels} C\n";
echo "Фаренгейт: {$fahrenheit} F\n";
echo "Кельвин: {$kelvin} K\n";
