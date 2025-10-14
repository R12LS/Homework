<?php
$gscore = (int)readline("Введите оценку: ");

switch ($score) {
    case 5:
        echo " - Отлично";
        break;
    case 4:
        echo " - Хорошо";
        break;
    case 3:
        echo " - Удовлетворительно";
        break;
    case 2:
        echo " - Неудовлетворительно";
        break;
    default:
        echo " - Такой оценки нет";
        break;
}
