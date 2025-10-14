<?php
echo "Таблица умножения\n";
for ($i = 1; $i <= 10; $i++) {
    for ($a = 1; $a <= 10; $a++) {
        echo str_pad($i * $a . " ", 3); // хз как сделать таблицу в консоли, html теги не работают
    }
    echo "\n";
}
echo "\n";

$i = 1;

while ($i <= 10) {
    $j = 1;
    while ($j <= 10) {
        echo str_pad($i * $j . " ", 3);
        $j++;
    }
    echo "\n";
    $i++;
}
?>
