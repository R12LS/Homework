# Практические задания по основам PHP

## Оглавление
1. [Первая программа](#1-первая-программа)
2. [Переменные и типы данных](#2-переменные-и-типы-данных)
3. [Условные операторы](#3-условные-операторы)
4. [Циклы](#4-циклы)
5. [Функции](#5-функции)
6. [Массивы](#6-массивы)
7. [Работа с файлами](#7-работа-с-файлами)
8. [Комментарии и стиль кода](#8-комментарии-и-стиль-кода)
9. [Комплексная задача](#9-комплексная-задача)

---

## 1. Первая программа

**Задача 1.1: "Hello, World!"**
- **Цель:** Создать первую PHP программу
- **Задание:**
  1. Создайте файл `hello.php`
  2. Выведите приветствие на русском и английском
  3. Добавьте вывод текущей даты и времени

<details>
<summary>Показать решение</summary>

```php
<?php
echo "<h1>Привет, мир! Hello, World!</h1>";
echo "Текущая дата: " . date('d.m.Y') . "<br>";
echo "Текущее время: " . date('H:i:s') . "<br>";

$name = "Дмитрий";
$age = 19;
echo "Меня зовут $name, мне $age лет";
?>
```
</details>

**Задача 1.2: Калькулятор возраста**
- **Цель:** Практика базовых операций
- **Задание:**
  1. Запросите год рождения пользователя
  2. Рассчитайте и выведите возраст
  3. Добавьте проверку на совершеннолетие

<details>
<summary>Показать решение</summary>

```php
<?php
// Запрос года рождения
$birthYear = (int)readline("Введите год вашего рождения: ");

// Получение текущего года
$currentYear = (int)date('Y');

// Проверка корректности ввода
if ($birthYear < 1900 || $birthYear > $currentYear) {
    exit("Ошибка: некорректный год рождения!\n");
}

// Расчет возраста
$age = $currentYear - $birthYear;

// Вывод результата
echo "Ваш возраст: $age лет\n";
echo "Статус: " . ($age >= 18 ? "совершеннолетний" : "несовершеннолетний") . "\n";
?>
```
</details>

<details>
<summary>Показать решение для веб-версии</summary>

```php
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $birthYear = (int)($_POST['birth_year'] ?? 0);
    $currentYear = (int)date('Y');
    
    if ($birthYear >= 1900 && $birthYear <= $currentYear) {
        $age = $currentYear - $birthYear;
        $status = $age >= 18 ? 'совершеннолетний' : 'несовершеннолетний';
        $result = "Возраст: $age лет ($status)";
    } else {
        $result = "Ошибка: некорректный год рождения!";
    }
}
?>

<form method="post">
    <input type="number" name="birth_year" min="1900" max="<?= date('Y') ?>" 
           placeholder="Год рождения" required>
    <button type="submit">Рассчитать</button>
</form>

<?php if (isset($result)): ?>
    <p><strong><?= htmlspecialchars($result) ?></strong></p>
<?php endif; ?>
```
</details>

## 2. Переменные и типы данных

**Задача 2.1: Работа с разными типами данных**
- **Цель:** Освоить различные типы переменных
- **Задание:**
  1. Создайте переменные всех основных типов
  2. Выведите их значения и типы
  3. Продемонстрируйте преобразование типов

<details>
<summary>Показать решение</summary>

```php
<?php
// Разные типы данных
$string = "Текстовая строка";
$integer = 42;
$float = 3.14159;
$boolean = true;
$array = [1, 2, 3];
$null = null;

// Вывод информации
echo "Тип string: " . gettype($string) . " - $string<br>";
echo "Тип integer: " . gettype($integer) . " - $integer<br>";

// Преобразование типов
$number_string = "123";
$real_number = (int)$number_string;
echo "Преобразование: $number_string -> $real_number<br>";
?>
```
</details>

**Задача 2.2: Конвертер температур**
- **Цель:** Практика математических операций
- **Задание:**
  1. Создайте конвертер из Цельсия в Фаренгейт
  2. Добавьте конвертацию в Кельвины
  3. Сделайте округление до 2 знаков после запятой

<details>
<summary>Показать решение</summary>

```php
<?php
// Запрос температуры
$celsius = (float)readline("Введите температуру в °C: ");

// Конвертация
$fahrenheit = round($celsius * 9/5 + 32, 2);
$kelvin = round($celsius + 273.15, 2);

// Вывод результата
echo "Цельсий: {$celsius}°C\n";
echo "Фаренгейт: {$fahrenheit}°F\n";
echo "Кельвин: {$kelvin}K\n";
?>
```
</details>

<details>
<summary>Показать решение для веб-версии</summary>

```php
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $celsius = (float)($_POST['celsius'] ?? 0);
    $fahrenheit = round($celsius * 9/5 + 32, 2);
    $kelvin = round($celsius + 273.15, 2);
}
?>

<form method="post">
    <input type="number" step="any" name="celsius" placeholder="Температура в °C" required>
    <button type="submit">Конвертировать</button>
</form>

<?php if (isset($celsius)): ?>
    <div style="margin-top: 20px; padding: 15px; background: #f5f5f5; border-radius: 8px;">
        <strong>Результаты конвертации:</strong><br>
        Цельсий: <?= htmlspecialchars($celsius) ?>°C<br>
        Фаренгейт: <?= htmlspecialchars($fahrenheit) ?>°F<br>
        Кельвин: <?= htmlspecialchars($kelvin) ?>K
    </div>
<?php endif; ?>
```
</details>

## 3. Условные операторы

**Задача 3.1: Система оценок**
- **Цель:** Освоить if-else конструкции
- **Задание:**
  1. Напишите скрипт, который принимает оценку от 1 до 5
  2. Выведите текстовое описание оценки
  3. Добавьте проверку на корректность ввода

<details>
<summary>Показать решение</summary>

```php
<?php
$grade = 4;

if ($grade == 5) {
    echo "Отлично!";
} elseif ($grade == 4) {
    echo "Хорошо";
} elseif ($grade == 3) {
    echo "Удовлетворительно";
} elseif ($grade == 2) {
    echo "Неудовлетворительно";
} elseif ($grade == 1) {
    echo "Плохо";
} else {
    echo "Некорректная оценка";
}

// Switch вариант
switch ($grade) {
    case 5: echo " - Великолепно!"; break;
    case 4: echo " - Неплохо"; break;
    default: echo " - Нужно подтянуть"; break;
}
?>
```
</details>

**Задача 3.2: Калькулятор ИМТ**
- **Цель:** Практика сложных условий
- **Задание:**
  1. Рассчитайте индекс массы тела
  2. Выведите категорию (недостаток, норма, избыток)
  3. Добавьте рекомендации по результатам

<details>
<summary>Показать решение</summary>

```php
<?php
// Запрос данных
$weight = (float)readline("Введите вес (кг): ");
$height = (float)readline("Введите рост (м): ");

// Расчет ИМТ
$bmi = round($weight / ($height * $height), 1);

// Определение категории
if ($bmi < 18.5) {
    $category = "недостаточный вес";
    $advice = "Рекомендуется увеличить калорийность питания";
} elseif ($bmi < 25) {
    $category = "нормальный вес";
    $advice = "Отличный результат! Поддерживайте текущий режим";
} elseif ($bmi < 30) {
    $category = "избыточный вес";
    $advice = "Рекомендуется умеренная физическая активность";
} else {
    $category = "ожирение";
    $advice = "Рекомендуется консультация специалиста";
}

// Вывод результата
echo "Ваш ИМТ: {$bmi}\n";
echo "Категория: {$category}\n";
echo "Рекомендация: {$advice}\n";
?>
```
</details>

<details>
<summary>Показать решение для веб-версии</summary>

```php
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $weight = (float)($_POST['weight'] ?? 0);
    $height = (float)($_POST['height'] ?? 0) / 100; // конвертация см в метры
    
    if ($weight > 0 && $height > 0) {
        $bmi = round($weight / ($height * $height), 1);
        
        // Компактное определение категории
        $categories = [
            [18.5, "недостаточный вес", "Увеличьте калорийность питания"],
            [25, "нормальный вес", "Поддерживайте текущий режим"],
            [30, "избыточный вес", "Умеренная физическая активность"],
            [PHP_FLOAT_MAX, "ожирение", "Консультация специалиста"]
        ];
        
        foreach ($categories as [$limit, $cat, $adv]) {
            if ($bmi < $limit) {
                $category = $cat;
                $advice = $adv;
                break;
            }
        }
    }
}
?>

<form method="post">
    <input type="number" step="0.1" name="weight" placeholder="Вес (кг)" min="1" required>
    <input type="number" step="0.1" name="height" placeholder="Рост (см)" min="50" required>
    <button type="submit">Рассчитать ИМТ</button>
</form>

<?php if (isset($bmi)): ?>
    <div style="margin-top:20px; padding:15px; background:#f0f8ff; border-radius:8px;">
        <strong>Результат:</strong><br>
        ИМТ: <?= $bmi ?><br>
        Категория: <?= $category ?><br>
        Рекомендация: <?= $advice ?>
    </div>
<?php endif; ?>
```
</details>

## 4. Циклы

**Задача 4.1: Таблица умножения**
- **Цель:** Освоить циклы for и while
- **Задание:**
  1. Создайте таблицу умножения 10x10
  2. Используйте вложенные циклы
  3. Добавьте оформление в HTML таблицу

**Решение:**
```php
<?php
echo "<table border='1'>";
for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= 10; $j++) {
        echo "<td>" . $i * $j . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

// While вариант
echo "<br>Четные числа: ";
$counter = 1;
while ($counter <= 20) {
    if ($counter % 2 == 0) {
        echo $counter . " ";
    }
    $counter++;
}
?>
```

**Задача 4.2: Генератор паролей**
- **Цель:** Практика работы со строками в циклах
- **Задание:**
  1. Создайте генератор случайных паролей
  2. Пароль должен содержать буквы и цифры
  3. Добавьте выбор длины пароля

<details>
<summary>Показать решение</summary>

</details>

<details>
<summary>Показать решение для веб-версии</summary>

```php
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $length = (int)($_POST['length'] ?? 12);
    $length = max(8, min(32, $length));
    
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = substr(str_shuffle(str_repeat($chars, 5)), 0, $length);
}
?>

<form method="post">
    <input type="number" name="length" value="12" min="8" max="32" placeholder="Длина пароля">
    <button type="submit">Сгенерировать</button>
</form>

<?php if (isset($password)): ?>
    <div style="margin-top:20px; padding:15px; background:#e8f5e8; border-radius:8px;">
        <strong>Пароль:</strong> <?= htmlspecialchars($password) ?>
    </div>
<?php endif; ?>
```
</details>

<details>
<summary>Решение в одну строчку или КАК НЕ НУЖНО ПИСАТЬ КОД</summary>

```php
<?php
$l = max(8, min(32, (int)readline("Длина: ")));
echo substr(str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', 5)), 0, $l);
?>
```
</details>

<details>
<summary>Показать решение с гарантированным наличием букв и цифр</summary>

```php
<?php
$length = max(8, min(32, (int)readline("Длина пароля: ")));

// Минимум по 1 букве и цифре
$password = [
    chr(random_int(97, 122)), // строчная буква
    chr(random_int(65, 90)),  // заглавная буква  
    chr(random_int(48, 57))   // цифра
];

// Добиваем до нужной длины
$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
for ($i = 3; $i < $length; $i++) {
    $password[] = $chars[random_int(0, strlen($chars) - 1)];
}

// Перемешиваем и выводим
shuffle($password);
echo implode('', $password);
?>
```
</details>

## 5. Функции

**Задача 5.1: Математические функции**
- **Цель:** Освоить создание и использование функций
- **Задание:**
  1. Создайте функции для основных математических операций
  2. Добавьте функцию вычисления факториала
  3. Протестируйте все функции

**Решение:**
```php
<?php
function add($a, $b) {
    return $a + $b;
}

function multiply($a, $b) {
    return $a * $b;
}

function factorial($n) {
    if ($n <= 1) return 1;
    return $n * factorial($n - 1);
}

// Тестирование функций
echo "Сумма: " . add(5, 3) . "<br>";
echo "Произведение: " . multiply(4, 5) . "<br>";
echo "Факториал 5: " . factorial(5) . "<br>";

// Анонимная функция
$divide = function($a, $b) {
    return $a / $b;
};
echo "Деление: " . $divide(10, 2);
?>
```

**Задача 5.2: Валидация данных**
- **Цель:** Практика создания функций валидации
- **Задание:**
  1. Создайте функции для проверки email и телефона
  2. Добавьте проверку сложности пароля
  3. Создайте функцию для санитизации ввода

<details>
<summary>Показать решение</summary>

```php
<?php
// Функция валидации email
function validateEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Функция валидации телефона (российский формат)
function validatePhone(string $phone): bool {
    return preg_match('/^\+7\d{10}$/', preg_replace('/\D/', '', $phone)) === 1;
}

// Функция проверки сложности пароля
function validatePassword(string $password): array {
    $errors = [];
    if (strlen($password) < 8) $errors[] = "Минимум 8 символов";
    if (!preg_match('/[A-Z]/', $password)) $errors[] = "Хотя бы одна заглавная буква";
    if (!preg_match('/[a-z]/', $password)) $errors[] = "Хотя бы одна строчная буква";
    if (!preg_match('/\d/', $password)) $errors[] = "Хотя бы одна цифра";
    if (!preg_match('/[^a-zA-Z\d]/', $password)) $errors[] = "Хотя бы один спецсимвол";
    return $errors;
}

// Функция санитизации ввода
function sanitizeInput(string $input): string {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Демонстрация работы
$testData = [
    'email' => 'test@example.com',
    'phone' => '+79161234567', 
    'password' => 'Weak123'
];

foreach ($testData as $type => $value) {
    $clean = sanitizeInput($value);
    echo "{$type}: {$clean}\n";
    
    match($type) {
        'email' => echo "Email valid: ", validateEmail($clean) ? 'Yes' : 'No', "\n",
        'phone' => echo "Phone valid: ", validatePhone($clean) ? 'Yes' : 'No', "\n",
        'password' => {
            $errors = validatePassword($clean);
            echo "Password valid: ", empty($errors) ? 'Yes' : 'No', "\n";
            if ($errors) echo "Errors: ", implode(', ', $errors), "\n";
        }
    };
    echo "---\n";
}
?>
```
</details>

<details>
<summary>Показать решение для веб-версии</summary>

```php
<?php
// Те же функции валидации...

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitizeInput($_POST['email'] ?? '');
    $phone = sanitizeInput($_POST['phone'] ?? '');
    $password = sanitizeInput($_POST['password'] ?? '');
    
    $results = [
        'email' => validateEmail($email),
        'phone' => validatePhone($phone),
        'password_errors' => validatePassword($password)
    ];
}
?>

<form method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="tel" name="phone" placeholder="Телефон (+79161234567)" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <button type="submit">Проверить</button>
</form>

<?php if (isset($results)): ?>
<div style="margin-top:20px; padding:15px; background:#f0f0f0; border-radius:8px;">
    <strong>Результаты валидации:</strong><br>
    Email: <?= $results['email'] ? '✅ Valid' : '❌ Invalid' ?><br>
    Телефон: <?= $results['phone'] ? '✅ Valid' : '❌ Invalid' ?><br>
    Пароль: <?= empty($results['password_errors']) ? '✅ Valid' : '❌ Invalid' ?>
    <?php if (!empty($results['password_errors'])): ?>
        <br>Ошибки: <?= implode(', ', $results['password_errors']) ?>
    <?php endif; ?>
</div>
<?php endif; ?>
```
</details>

<details>
<summary>Как НЕ нужно писать код</summary>

```php
<?php
function vEmail($e) { return filter_var($e, FILTER_VALIDATE_EMAIL); }
function vPhone($p) { return preg_match('/^\+7\d{10}$/', preg_replace('/\D/', '', $p)); }
function vPass($p) { 
    return strlen($p) >= 8 && preg_match('/[A-Z]/', $p) && preg_match('/[a-z]/', $p) 
           && preg_match('/\d/', $p) && preg_match('/[^a-zA-Z\d]/', $p);
}
function sanitize($i) { return htmlspecialchars(trim($i)); }

// Быстрая проверка
$e = sanitize($_POST['email'] ?? '');
echo "Email: ", vEmail($e) ? 'OK' : 'Invalid';
?>
```
</details>
## 6. Массивы

**Задача 6.1: Работа с массивами данных**
- **Цель:** Освоить основные операции с массивами
- **Задание:**
  1. Создайте массив с данными студентов
  2. Реализуйте поиск, сортировку, фильтрацию
  3. Выведите данные в formatted виде

<details>
<summary>Показать решение</summary>

```php
<?php
$students = [
    ["name" => "Анна", "age" => 20, "grade" => 5],
    ["name" => "Иван", "age" => 21, "grade" => 4],
    ["name" => "Мария", "age" => 19, "grade" => 5],
    ["name" => "Петр", "age" => 22, "grade" => 3]
];

// Сортировка по имени
usort($students, function($a, $b) {
    return $a['name'] <=> $b['name'];
});

// Вывод данных
echo "<h2>Список студентов:</h2>";
foreach ($students as $student) {
    echo "Имя: {$student['name']}, Возраст: {$student['age']}, Оценка: {$student['grade']}<br>";
}

// Поиск отличников
$excellent = array_filter($students, function($student) {
    return $student['grade'] == 5;
});

echo "<h2>Отличники:</h2>";
print_r($excellent);
?>
```
</details>

**Задача 6.2: Система управления задачами**
- **Цель:** Практика работы с многомерными массивами
- **Задание:**
  1. Создайте систему управления задачами (todo list)
  2. Реализуйте добавление, удаление, отметку выполненных
  3. Добавьте фильтрацию по статусу задач

<details>
<summary>Показать оптимизированный код</summary>

```php
<?php
session_start();
$_SESSION['t'] ??= [];

// Обработка действий
match ($_POST['a'] ?? '') {
    'add' => $_SESSION['t'][] = ['t' => $_POST['t'], 'c' => false, 'id' => uniqid()],
    'del' => $_SESSION['t'] = array_filter($_SESSION['t'], fn($x) => $x['id'] !== $_POST['id']),
    'tg' => array_walk($_SESSION['t'], fn(&$x) => $x['id'] === $_POST['id'] ? $x['c'] = !$x['c'] : null),
    default => null
};

// Фильтрация
$f = $_GET['f'] ?? 'all';
$ts = match($f) {
    'com' => array_filter($_SESSION['t'], fn($x) => $x['c']),
    'act' => array_filter($_SESSION['t'], fn($x) => !$x['c']),
    default => $_SESSION['t']
};
?>

<form method="post"><input name="t" required><input type="hidden" name="a" value="add"><button>+</button></form>
<a href="?f=all">Все</a> | <a href="?f=act">Активные</a> | <a href="?f=com">Завершенные</a>
<ul><?php foreach ($ts as $t): ?>
<li style="<?= $t['c'] ? 'text-decoration:line-through' : '' ?>">
    <?= htmlspecialchars($t['t']) ?>
    <form method="post" style="display:inline">
        <input type="hidden" name="id" value="<?= $t['id'] ?>">
        <input type="hidden" name="a" value="tg">
        <button><?= $t['c'] ? '❌' : '✅' ?></button>
    </form>
    <form method="post" style="display:inline">
        <input type="hidden" name="id" value="<?= $t['id'] ?>">
        <input type="hidden" name="a" value="del">
        <button>🗑️</button>
    </form>
</li>
<?php endforeach; ?></ul>
```
</details>

<details>
<summary>Показать решение для веб-версии</summary>

```php
<?php
session_start();

// Инициализация массива задач
$_SESSION['tasks'] ??= [];

// Функции управления задачами
function addTask(string $title): void {
    $_SESSION['tasks'][] = ['title' => $title, 'completed' => false, 'id' => uniqid()];
}

function deleteTask(string $id): void {
    $_SESSION['tasks'] = array_filter($_SESSION['tasks'], fn($task) => $task['id'] !== $id);
}

function toggleTask(string $id): void {
    foreach ($_SESSION['tasks'] as &$task) {
        if ($task['id'] === $id) {
            $task['completed'] = !$task['completed'];
            break;
        }
    }
}

function getTasks(?bool $completed = null): array {
    return $completed === null 
        ? $_SESSION['tasks'] 
        : array_filter($_SESSION['tasks'], fn($task) => $task['completed'] === $completed);
}

// Обработка действий
match ($_POST['action'] ?? '') {
    'add' => addTask(trim($_POST['title'] ?? '')),
    'delete' => deleteTask($_POST['id'] ?? ''),
    'toggle' => toggleTask($_POST['id'] ?? ''),
    default => null
};

// Фильтр
$filter = $_GET['filter'] ?? 'all';
$tasks = match($filter) {
    'completed' => getTasks(true),
    'active' => getTasks(false),
    default => getTasks()
};
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Todo List</h2>
    
    <!-- Форма добавления -->
    <form method="post">
        <input type="text" name="title" placeholder="Новая задача" required>
        <input type="hidden" name="action" value="add">
        <button>Добавить</button>
    </form>

    <!-- Фильтры -->
    <div style="margin:10px 0">
        <a href="?filter=all">Все</a> | 
        <a href="?filter=active">Активные</a> | 
        <a href="?filter=completed">Завершенные</a>
    </div>

    <!-- Список задач -->
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li style="<?= $task['completed'] ? 'text-decoration:line-through;color:gray' : '' ?>">
                <?= htmlspecialchars($task['title']) ?>
                
                <form method="post" style="display:inline">
                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                    <input type="hidden" name="action" value="toggle">
                    <button><?= $task['completed'] ? '❌' : '✅' ?></button>
                </form>
                
                <form method="post" style="display:inline">
                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                    <input type="hidden" name="action" value="delete">
                    <button>🗑️</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
```
</details>

## 7. Работа с файлами

**Задача 7.1: Журнал посещений**
- **Цель:** Освоить базовые операции с файлами
- **Задание:**
  1. Создайте систему логирования посещений сайта
  2. Сохраняйте время посещения и IP-адрес
  3. Реализуйте просмотр лога

<details>
<summary>Показать решение</summary>

```php
<?php
// Запись в лог
function logVisit() {
    $logFile = "visits.log";
    $timestamp = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];
    $logEntry = "$timestamp - IP: $ip\n";
    
    file_put_contents($logFile, $logEntry, FILE_APPEND);
}

// Чтение лога
function showLog() {
    $logFile = "visits.log";
    if (file_exists($logFile)) {
        $content = file_get_contents($logFile);
        echo "<pre>Журнал посещений:\n$content</pre>";
    } else {
        echo "Лог файл не существует";
    }
}

// Использование
logVisit();
showLog();
?>
```
</details>

**Задача 7.2: Система комментариев**
- **Цель:** Практика работы с файлами как БД
- **Задание:**
  1. Создайте простую систему комментариев
  2. Сохраняйте комментарии в файл
  3. Реализуйте добавление и просмотр комментариев

<details>
<summary>Показать решение для веб-версии</summary>

```php
<?php
define('COMMENTS_FILE', 'comments.txt');

// Функция добавления комментария
function addComment(string $name, string $comment): void {
    $data = [
        'name' => htmlspecialchars(trim($name)),
        'comment' => htmlspecialchars(trim($comment)),
        'time' => time()
    ];
    file_put_contents(COMMENTS_FILE, json_encode($data) . PHP_EOL, FILE_APPEND | LOCK_EX);
}

// Функция получения комментариев
function getComments(): array {
    if (!file_exists(COMMENTS_FILE)) return [];
    
    $comments = [];
    $lines = file(COMMENTS_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach ($lines as $line) {
        $comments[] = json_decode($line, true);
    }
    
    return array_reverse($comments); // Новые сверху
}

// Обработка формы
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name']) && !empty($_POST['comment'])) {
    addComment($_POST['name'], $_POST['comment']);
    header('Location: ' . $_SERVER['PHP_SELF']); // Перенаправление чтобы избежать повторной отправки
    exit;
}

$comments = getComments();
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Система комментариев</h2>
    
    <!-- Форма добавления -->
    <form method="post" style="margin-bottom: 30px;">
        <input type="text" name="name" placeholder="Ваше имя" required><br><br>
        <textarea name="comment" placeholder="Ваш комментарий" rows="3" required></textarea><br><br>
        <button>Добавить комментарий</button>
    </form>

    <!-- Список комментариев -->
    <div>
        <h3>Комментарии (<?= count($comments) ?>):</h3>
        <?php if (empty($comments)): ?>
            <p>Пока нет комментариев. Будьте первым!</p>
        <?php else: ?>
            <?php foreach ($comments as $comment): ?>
                <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0; border-radius: 5px;">
                    <strong><?= $comment['name'] ?></strong>
                    <small style="color: #666;"><?= date('d.m.Y H:i', $comment['time']) ?></small>
                    <p><?= nl2br($comment['comment']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
```
</details>

<details>
<summary>Показать оптимизированное решение</summary>

```php
<?php
// Конфигурация
$file = 'comments.txt';

// Добавление комментария
if ($_POST['n'] && $_POST['c']) {
    $data = ['n' => htmlspecialchars(trim($_POST['n'])), 'c' => htmlspecialchars(trim($_POST['c'])), 't' => time()];
    file_put_contents($file, json_encode($data).PHP_EOL, FILE_APPEND | LOCK_EX);
    header('Location: ?');
    exit;
}

// Чтение комментариев
$comments = file_exists($file) ? array_reverse(array_map('json_decode', file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES))) : [];
?>

<form method="post">
    <input name="n" placeholder="Имя" required>
    <textarea name="c" placeholder="Комментарий" required></textarea>
    <button>Отправить</button>
</form>

<?php foreach ($comments as $c): ?>
<div>
    <strong><?= $c->n ?></strong> <small><?= date('H:i d.m.Y', $c->t) ?></small>
    <p><?= nl2br($c->c) ?></p>
</div>
<?php endforeach; ?>
```
</details>

<details>
<summary>Показать решение с валидацией и анти-спамом</summary>

```php
<?php
$file = 'comments.txt';

// Защита от спама (не более 1 комментария в минуту с одного IP)
function canComment(): bool {
    $lastComment = @file_get_contents('last_comment.txt');
    return time() - (int)$lastComment > 60;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $comment = trim($_POST['comment'] ?? '');
    
    if (!empty($name) && !empty($comment) && canComment()) {
        $data = [
            'name' => htmlspecialchars($name, ENT_QUOTES),
            'comment' => htmlspecialchars($comment, ENT_QUOTES),
            'time' => time(),
            'ip' => $_SERVER['REMOTE_ADDR']
        ];
        
        file_put_contents($file, json_encode($data) . PHP_EOL, FILE_APPEND | LOCK_EX);
        file_put_contents('last_comment.txt', time()); // Сохраняем время последнего комментария
    }
    
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$comments = file_exists($file) 
    ? array_reverse(array_map('json_decode', file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)))
    : [];
?>
```
</details>

## 8. Комментарии и стиль кода

**Задача 8.1: Документирование кода**
- **Цель:** Научиться писать качественные комментарии
- **Задание:**
  1. Возьмите код из предыдущих заданий
  2. Добавьте DocBlock комментарии к функциям
  3. Добавьте inline комментарии к сложным местам

<details>
<summary>Показать решение</summary>

```php
<?php
/**
 * Калькулятор для математических операций
 * 
 * @package MathOperations
 * @version 1.0
 */
class Calculator {
    
    /**
     * Сложение двух чисел
     * 
     * @param float $a Первое число
     * @param float $b Второе число
     * @return float Результат сложения
     */
    public function add($a, $b) {
        // Проверка на числовые значения
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new InvalidArgumentException("Оба аргумента должны быть числами");
        }
        
        return $a + $b;
    }
    
    /**
     * Вычисление факториала числа
     * 
     * @param int $n Число для вычисления факториала
     * @return int Результат вычисления
     */
    public function factorial($n) {
        // Базовый случай рекурсии
        if ($n <= 1) return 1;
        
        // Рекурсивный вызов
        return $n * $this->factorial($n - 1);
    }
}

// Пример использования
$calc = new Calculator();
$result = $calc->add(5, 3); // Результат: 8
?>
```
</details>

**Задача 8.2: Рефакторинг кода**
- **Цель:** Практика улучшения читаемости кода
- **Задание:**
  1. Возьмите сложный код из предыдущих заданий
  2. Улучшите именование переменных и функций
  3. Разбейте на меньшие функции
  4. Добавьте обработку ошибок

<details>
<summary>Показать решение для веб-версии</summary>

```php
<?php
declare(strict_types=1);

class CommentSystem {
    private const STORAGE_FILE = 'comments.txt';
    private const MAX_COMMENT_LENGTH = 1000;
    private const MAX_NAME_LENGTH = 100;
    private const MIN_TIME_BETWEEN_COMMENTS = 60; // 1 minute
    
    /**
     * Добавление нового комментария
     */
    public static function addComment(string $userName, string $commentText): void {
        self::validateInput($userName, $commentText);
        self::checkCommentFrequency();
        
        $commentData = [
            'user_name' => self::sanitizeInput($userName),
            'comment_text' => self::sanitizeInput($commentText),
            'timestamp' => time(),
            'user_ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
        ];
        
        self::saveCommentToFile($commentData);
        self::updateLastCommentTime();
    }
    
    /**
     * Получение всех комментариев
     */
    public static function getAllComments(): array {
        if (!file_exists(self::STORAGE_FILE)) {
            return [];
        }
        
        try {
            $fileLines = file(self::STORAGE_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $comments = array_map('json_decode', $fileLines);
            return array_reverse($comments); // Новые комментарии first
        } catch (Exception $e) {
            error_log("Error reading comments: " . $e->getMessage());
            return [];
        }
    }
    
    /**
     * Валидация входных данных
     */
    private static function validateInput(string $userName, string $commentText): void {
        if (empty(trim($userName))) {
            throw new InvalidArgumentException("Имя пользователя не может быть пустым");
        }
        
        if (empty(trim($commentText))) {
            throw new InvalidArgumentException("Текст комментария не может быть пустым");
        }
        
        if (strlen($userName) > self::MAX_NAME_LENGTH) {
            throw new InvalidArgumentException("Имя пользователя слишком длинное");
        }
        
        if (strlen($commentText) > self::MAX_COMMENT_LENGTH) {
            throw new InvalidArgumentException("Комментарий слишком длинный");
        }
    }
    
    /**
     * Проверка частоты комментариев
     */
    private static function checkCommentFrequency(): void {
        $lastCommentTime = self::getLastCommentTime();
        $currentTime = time();
        
        if ($currentTime - $lastCommentTime < self::MIN_TIME_BETWEEN_COMMENTS) {
            throw new RuntimeException("Слишком частые комментарии. Попробуйте позже.");
        }
    }
    
    /**
     * Санитизация входных данных
     */
    private static function sanitizeInput(string $input): string {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
    
    /**
     * Сохранение комментария в файл
     */
    private static function saveCommentToFile(array $commentData): void {
        $jsonData = json_encode($commentData, JSON_UNESCAPED_UNICODE);
        
        if ($jsonData === false) {
            throw new RuntimeException("Ошибка кодирования данных комментария");
        }
        
        $result = file_put_contents(
            self::STORAGE_FILE, 
            $jsonData . PHP_EOL, 
            FILE_APPEND | LOCK_EX
        );
        
        if ($result === false) {
            throw new RuntimeException("Ошибка сохранения комментария");
        }
    }
    
    /**
     * Получение времени последнего комментария
     */
    private static function getLastCommentTime(): int {
        if (!file_exists('last_comment_time.txt')) {
            return 0;
        }
        
        $time = file_get_contents('last_comment_time.txt');
        return is_numeric($time) ? (int)$time : 0;
    }
    
    /**
     * Обновление времени последнего комментария
     */
    private static function updateLastCommentTime(): void {
        file_put_contents('last_comment_time.txt', time());
    }
    
    /**
     * Форматирование времени для отображения
     */
    public static function formatTimestamp(int $timestamp): string {
        return date('d.m.Y H:i', $timestamp);
    }
}

// Обработка запросов
try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userName = $_POST['user_name'] ?? '';
        $commentText = $_POST['comment_text'] ?? '';
        
        CommentSystem::addComment($userName, $commentText);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
}

// Получение комментариев для отображения
$comments = CommentSystem::getAllComments();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Система комментариев</title>
    <style>
        .comment { border: 1px solid #ddd; padding: 15px; margin: 10px 0; border-radius: 5px; }
        .comment-header { display: flex; justify-content: space-between; margin-bottom: 10px; }
        .user-name { font-weight: bold; color: #333; }
        .comment-time { color: #666; font-size: 0.9em; }
        .error { color: #d32f2f; background: #ffebee; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .success { color: #2e7d32; background: #e8f5e8; padding: 10px; border-radius: 4px; margin: 10px 0; }
        form { margin-bottom: 30px; }
        input, textarea { width: 100%; max-width: 500px; padding: 8px; margin: 5px 0; }
    </style>
</head>
<body>
    <h1>Система комментариев</h1>
    
    <!-- Форма добавления комментария -->
    <form method="post">
        <div>
            <input type="text" name="user_name" placeholder="Ваше имя" required 
                   maxlength="<?= CommentSystem::MAX_NAME_LENGTH ?>">
        </div>
        <div>
            <textarea name="comment_text" placeholder="Ваш комментарий" rows="4" required
                      maxlength="<?= CommentSystem::MAX_COMMENT_LENGTH ?>"></textarea>
        </div>
        <button type="submit">Добавить комментарий</button>
    </form>

    <!-- Вывод сообщений об ошибках/успехе -->
    <?php if (isset($errorMessage)): ?>
        <div class="error">Ошибка: <?= htmlspecialchars($errorMessage) ?></div>
    <?php endif; ?>

    <!-- Список комментариев -->
    <h2>Комментарии (<?= count($comments) ?>):</h2>
    
    <?php if (empty($comments)): ?>
        <p>Пока нет комментариев. Будьте первым!</p>
    <?php else: ?>
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <div class="comment-header">
                    <span class="user-name"><?= htmlspecialchars($comment->user_name) ?></span>
                    <span class="comment-time">
                        <?= CommentSystem::formatTimestamp($comment->timestamp) ?>
                    </span>
                </div>
                <p><?= nl2br(htmlspecialchars($comment->comment_text)) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
```
</details>

## 9. Комплексная задача

**Задача 9.1: Персональный сайт-визитка**
- **Цель:** Применить все полученные знания
- **Задание:**
  1. Создайте персональный сайт-визитку на PHP
  2. Реализуйте разделы: о себе, портфолио, контакты
  3. Добавьте систему обратной связи
  4. Реализуйте подсчет посещений

**Структура проекта:**
```
my-website/
├── index.php
├── about.php
├── portfolio.php
├── contact.php
├── style.css
└── data/
    ├── visits.log
    └── messages.txt
```

<details>
<summary>Показать ПРИМЕР решения</summary>

```php
<?php
/**
 * Главная страница сайта-визитки
 * 
 * @package PersonalWebsite
 * @author Ваше Имя
 * @version 1.0
 */

// Подсчет посещений
function countVisit() {
    $counterFile = 'data/visits.txt';
    $count = 1;
    
    if (file_exists($counterFile)) {
        $count = (int)file_get_contents($counterFile) + 1;
    }
    
    file_put_contents($counterFile, $count);
    return $count;
}

$visitCount = countVisit();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Мой сайт-визитка</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Добро пожаловать на мой сайт!</h1>
        <nav>
            <a href="index.php">Главная</a>
            <a href="about.php">Обо мне</a>
            <a href="portfolio.php">Портфолио</a>
            <a href="contact.php">Контакты</a>
        </nav>
    </header>
    
    <main>
        <section>
            <h2>Обо мне</h2>
            <p>Привет! Меня зовут Дмитрий, я PHP-разработчик.</p>
        </section>
        
        <section>
            <h2>Статистика</h2>
            <p>Этот сайт посетили: <?php echo $visitCount; ?> раз</p>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2025 Мой сайт-визитка</p>
    </footer>
</body>
</html>
```
</details>

**Задача 9.2. Прокачка:**
1. Добавьте систему комментариев к портфолио
2. Реализуйте простую аутентификацию для админки
3. Создайте RSS-ленту новостей сайта
4. Добавьте возможность смены темы оформления

<details>
<summary>Посмотреть, что примерно должно выйти</summary>

```php
<?php
/**
 * Главная страница сайта-визитка с дополнительными функциями
 * 
 * @package PersonalWebsite
 * @version 2.0
 */

session_start();
define('VISITS_FILE', 'data/visits.txt');
define('COMMENTS_FILE', 'data/portfolio_comments.txt');
define('NEWS_FILE', 'data/news.txt');
define('ADMIN_USER', 'admin');
define('ADMIN_PASS_HASH', password_hash('admin123', PASSWORD_DEFAULT));

// Подсчет посещений
function countVisit(): int {
    $count = 1;
    if (file_exists(VISITS_FILE)) {
        $count = (int)file_get_contents(VISITS_FILE) + 1;
    }
    file_put_contents(VISITS_FILE, $count);
    return $count;
}

// Система комментариев для портфолио
function addComment(string $author, string $text): void {
    $comment = [
        'author' => htmlspecialchars(trim($author)),
        'text' => htmlspecialchars(trim($text)),
        'time' => time(),
        'ip' => $_SERVER['REMOTE_ADDR']
    ];
    file_put_contents(COMMENTS_FILE, json_encode($comment) . PHP_EOL, FILE_APPEND | LOCK_EX);
}

function getComments(): array {
    if (!file_exists(COMMENTS_FILE)) return [];
    $lines = file(COMMENTS_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return array_reverse(array_map('json_decode', $lines));
}

// Аутентификация
function login(string $username, string $password): bool {
    if ($username === ADMIN_USER && password_verify($password, ADMIN_PASS_HASH)) {
        $_SESSION['admin'] = true;
        return true;
    }
    return false;
}

function isAdmin(): bool {
    return $_SESSION['admin'] ?? false;
}

function logout(): void {
    unset($_SESSION['admin']);
}

// RSS-лента новостей
function generateRSS(): string {
    $news = getNews();
    $rss = '<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
<channel>
    <title>Новости моего сайта</title>
    <link>'.$_SERVER['HTTP_HOST'].'</link>
    <description>Последние новости и обновления</description>';
    
    foreach ($news as $item) {
        $rss .= '
    <item>
        <title>'.htmlspecialchars($item->title).'</title>
        <link>'.$_SERVER['HTTP_HOST'].'#news-'.$item->id.'</link>
        <description>'.htmlspecialchars($item->content).'</description>
        <pubDate>'.date('r', $item->time).'</pubDate>
    </item>';
    }
    
    $rss .= '
</channel>
</rss>';
    return $rss;
}

// Система новостей
function addNews(string $title, string $content): void {
    $news = getNews();
    $newItem = [
        'id' => uniqid(),
        'title' => htmlspecialchars(trim($title)),
        'content' => htmlspecialchars(trim($content)),
        'time' => time()
    ];
    $news[] = $newItem;
    file_put_contents(NEWS_FILE, json_encode($news));
}

function getNews(): array {
    if (!file_exists(NEWS_FILE)) return [];
    $data = file_get_contents(NEWS_FILE);
    return json_decode($data) ?: [];
}

// Смена темы оформления
function getTheme(): string {
    return $_COOKIE['theme'] ?? 'light';
}

function setTheme(string $theme): void {
    setcookie('theme', $theme, time() + 365 * 24 * 3600, '/');
}

// Обработка POST-запросов
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_comment'])) {
        addComment($_POST['author'], $_POST['comment_text']);
    }
    elseif (isset($_POST['login'])) {
        login($_POST['username'], $_POST['password']);
    }
    elseif (isset($_POST['logout'])) {
        logout();
    }
    elseif (isset($_POST['add_news']) && isAdmin()) {
        addNews($_POST['news_title'], $_POST['news_content']);
    }
    elseif (isset($_POST['change_theme'])) {
        setTheme($_POST['theme']);
    }
    header('Location: '.$_SERVER['PHP_SELF']);
    exit;
}

// Генерация RSS по запросу
if (isset($_GET['rss'])) {
    header('Content-Type: application/xml; charset=utf-8');
    echo generateRSS();
    exit;
}

$visitCount = countVisit();
$currentTheme = getTheme();
$comments = getComments();
$news = getNews();
?>

<!DOCTYPE html>
<html data-theme="<?= $currentTheme ?>">
<head>
    <title>Мой сайт-визитка</title>
    <link rel="stylesheet" href="style.css">
    <link rel="alternate" type="application/rss+xml" href="?rss=1" title="RSS новостей">
    <style>
        :root { --bg-color: #fff; --text-color: #333; --accent: #007bff; }
        [data-theme="dark"] { --bg-color: #333; --text-color: #fff; --accent: #0d6efd; }
        body { background: var(--bg-color); color: var(--text-color); transition: all 0.3s; }
        a { color: var(--accent); }
    </style>
</head>
<body>
    <header>
        <h1>Добро пожаловать на мой сайт!</h1>
        <nav>
            <a href="index.php">Главная</a>
            <a href="about.php">Обо мне</a>
            <a href="portfolio.php">Портфолио</a>
            <a href="contact.php">Контакты</a>
            <?php if (isAdmin()): ?>
                <a href="?logout=1">Выйти</a>
            <?php endif; ?>
        </nav>
        
        <form method="post" style="display:inline;">
            <select name="theme" onchange="this.form.submit()">
                <option value="light" <?= $currentTheme === 'light' ? 'selected' : '' ?>>Светлая</option>
                <option value="dark" <?= $currentTheme === 'dark' ? 'selected' : '' ?>>Темная</option>
            </select>
            <input type="hidden" name="change_theme" value="1">
        </form>
    </header>
    
    <main>
        <section>
            <h2>Обо мне</h2>
            <p>Привет! Меня зовут Дмитрий, я PHP-разработчик.</p>
        </section>
        
        <section>
            <h2>Новости</h2>
            <?php foreach ($news as $item): ?>
                <article>
                    <h3><?= $item->title ?></h3>
                    <p><?= nl2br($item->content) ?></p>
                    <small><?= date('d.m.Y H:i', $item->time) ?></small>
                </article>
            <?php endforeach; ?>
            
            <?php if (isAdmin()): ?>
                <form method="post">
                    <h3>Добавить новость</h3>
                    <input type="text" name="news_title" placeholder="Заголовок" required>
                    <textarea name="news_content" placeholder="Текст новости" required></textarea>
                    <button type="submit" name="add_news">Добавить</button>
                </form>
            <?php endif; ?>
        </section>
        
        <section>
            <h2>Комментарии к портфолио</h2>
            <form method="post">
                <input type="text" name="author" placeholder="Ваше имя" required>
                <textarea name="comment_text" placeholder="Ваш комментарий" required></textarea>
                <button type="submit" name="add_comment">Отправить</button>
            </form>
            
            <div class="comments">
                <?php foreach ($comments as $comment): ?>
                    <div class="comment">
                        <strong><?= $comment->author ?></strong>
                        <small><?= date('d.m.Y H:i', $comment->time) ?></small>
                        <p><?= nl2br($comment->text) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        
        <section>
            <h2>Статистика</h2>
            <p>Этот сайт посетили: <?= $visitCount ?> раз</p>
        </section>
        
        <?php if (!isAdmin()): ?>
            <section>
                <h2>Вход для администратора</h2>
                <form method="post">
                    <input type="text" name="username" placeholder="Логин" required>
                    <input type="password" name="password" placeholder="Пароль" required>
                    <button type="submit" name="login">Войти</button>
                </form>
            </section>
        <?php endif; ?>
    </main>
    
    <footer>
        <p>&copy; 2025 Мой сайт-визитка | <a href="?rss=1">RSS</a></p>
    </footer>
</body>
</html>
```
</details>

<details>
<summary>Посмотреть, что получилось у меня в итоге</summary>

```php
<?php
declare(strict_types=1);

/**
 * Персональный сайт-визитка с расширенными функциями
 * 
 * @package PersonalWebsite
 * @version 2.1
 */

session_start();

// Конфигурация
const CONFIG = [
    'files' => [
        'visits'    => 'data/visits.txt',
        'comments'  => 'data/portfolio_comments.txt',
        'news'      => 'data/news.txt'
    ],
    'admin' => [
        'username' => 'admin',
        'password' => 'admin123' // Пароль будет хеширован при первом запуске
    ],
    'theme' => [
        'default'   => 'light',
        'lifetime'  => 365 * 24 * 3600
    ]
];

// ==================== ФУНКЦИИ ЯДРА ====================

/**
 * Подсчет посещений сайта
 */
function countVisits(): int 
{
    $count = 1;
    $file = CONFIG['files']['visits'];
    
    if (file_exists($file)) {
        $count = (int)file_get_contents($file) + 1;
    }
    
    file_put_contents($file, (string)$count);
    return $count;
}

/**
 * Добавление комментария к портфолио
 */
function addComment(string $author, string $text): void 
{
    $comment = [
        'author' => htmlspecialchars(trim($author), ENT_QUOTES, 'UTF-8'),
        'text'   => htmlspecialchars(trim($text), ENT_QUOTES, 'UTF-8'),
        'time'   => time(),
        'ip'     => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
    ];
    
    file_put_contents(
        CONFIG['files']['comments'], 
        json_encode($comment, JSON_UNESCAPED_UNICODE) . PHP_EOL, 
        FILE_APPEND | LOCK_EX
    );
}

/**
 * Получение всех комментариев
 */
function getComments(): array 
{
    $file = CONFIG['files']['comments'];
    
    if (!file_exists($file)) {
        return [];
    }
    
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $comments = array_map('json_decode', $lines);
    
    return array_reverse($comments);
}

/**
 * Аутентификация администратора
 */
function authenticate(string $username, string $password): bool 
{
    static $passwordHash = null;
    
    if ($passwordHash === null) {
        $passwordHash = password_hash(CONFIG['admin']['password'], PASSWORD_DEFAULT);
    }
    
    if ($username === CONFIG['admin']['username'] && password_verify($password, $passwordHash)) {
        $_SESSION['admin'] = true;
        return true;
    }
    
    return false;
}

/**
 * Проверка прав администратора
 */
function isAdmin(): bool 
{
    return $_SESSION['admin'] ?? false;
}

/**
 * Выход из системы
 */
function logout(): void 
{
    unset($_SESSION['admin']);
}

/**
 * Добавление новости
 */
function addNews(string $title, string $content): void 
{
    $news = getNews();
    
    $newItem = [
        'id'      => uniqid('news_', true),
        'title'   => htmlspecialchars(trim($title), ENT_QUOTES, 'UTF-8'),
        'content' => htmlspecialchars(trim($content), ENT_QUOTES, 'UTF-8'),
        'time'    => time()
    ];
    
    $news[] = $newItem;
    file_put_contents(CONFIG['files']['news'], json_encode($news, JSON_UNESCAPED_UNICODE));
}

/**
 * Получение всех новостей
 */
function getNews(): array 
{
    $file = CONFIG['files']['news'];
    
    if (!file_exists($file)) {
        return [];
    }
    
    $data = file_get_contents($file);
    $news = json_decode($data, true) ?: [];
    
    // Сортируем по времени (новые первые)
    usort($news, fn($a, $b) => $b['time'] <=> $a['time']);
    
    return $news;
}

/**
 * Генерация RSS-ленты
 */
function generateRSS(): string 
{
    $news = getNews();
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    
    $rssHeader = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
<channel>
    <title>Новости моего сайта</title>
    <link>http://{$host}</link>
    <description>Последние новости и обновления</description>
XML;

    $rssItems = '';
    foreach ($news as $item) {
        $pubDate = date('r', $item['time']);
        $rssItems .= <<<XML
    <item>
        <title>{$item['title']}</title>
        <link>http://{$host}#news-{$item['id']}</link>
        <description>{$item['content']}</description>
        <pubDate>{$pubDate}</pubDate>
    </item>
XML;
    }

    $rssFooter = <<<XML
</channel>
</rss>
XML;

    return $rssHeader . $rssItems . $rssFooter;
}

/**
 * Управление темой оформления
 */
function getCurrentTheme(): string 
{
    return $_COOKIE['theme'] ?? CONFIG['theme']['default'];
}

function setTheme(string $theme): void 
{
    setcookie('theme', $theme, time() + CONFIG['theme']['lifetime'], '/');
}

// ==================== ОБРАБОТКА ЗАПРОСОВ ====================

// Обработка POST-запросов
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    switch ($action) {
        case 'add_comment':
            if (!empty($_POST['author']) && !empty($_POST['comment_text'])) {
                addComment($_POST['author'], $_POST['comment_text']);
            }
            break;
            
        case 'login':
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                authenticate($_POST['username'], $_POST['password']);
            }
            break;
            
        case 'logout':
            logout();
            break;
            
        case 'add_news':
            if (isAdmin() && !empty($_POST['news_title']) && !empty($_POST['news_content'])) {
                addNews($_POST['news_title'], $_POST['news_content']);
            }
            break;
            
        case 'change_theme':
            if (!empty($_POST['theme'])) {
                setTheme($_POST['theme']);
            }
            break;
    }
    
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Генерация RSS
if (isset($_GET['rss'])) {
    header('Content-Type: application/xml; charset=utf-8');
    echo generateRSS();
    exit;
}

// ==================== ПОДГОТОВКА ДАННЫХ ДЛЯ ОТОБРАЖЕНИЯ ====================

$visitCount = countVisits();
$currentTheme = getCurrentTheme();
$comments = getComments();
$news = getNews();

// ==================== HTML ШАБЛОН ====================
?>
<!DOCTYPE html>
<html lang="ru" data-theme="<?= $currentTheme ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой сайт-визитка</title>
    <link rel="stylesheet" href="style.css">
    <link rel="alternate" type="application/rss+xml" href="?rss=1" title="RSS новостей">
    <style>
        :root {
            --bg-color: #ffffff;
            --text-color: #333333;
            --accent-color: #007bff;
            --border-color: #dee2e6;
        }
        
        [data-theme="dark"] {
            --bg-color: #2d3748;
            --text-color: #e2e8f0;
            --accent-color: #63b3ed;
            --border-color: #4a5568;
        }
        
        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: all 0.3s ease;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        header {
            background: var(--bg-color);
            padding: 1rem 0;
            border-bottom: 2px solid var(--border-color);
            margin-bottom: 2rem;
        }
        
        nav {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }
        
        a {
            color: var(--accent-color);
            text-decoration: none;
        }
        
        a:hover {
            text-decoration: underline;
        }
        
        section {
            margin-bottom: 2rem;
            padding: 1.5rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background: var(--bg-color);
        }
        
        form {
            display: grid;
            gap: 1rem;
            max-width: 500px;
        }
        
        input, textarea, select {
            padding: 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            background: var(--bg-color);
            color: var(--text-color);
        }
        
        button {
            padding: 0.5rem 1rem;
            background: var(--accent-color);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .comment {
            border: 1px solid var(--border-color);
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 6px;
        }
        
        .news-article {
            margin-bottom: 1.5rem;
            padding: 1rem;
            border-left: 4px solid var(--accent-color);
            background: var(--bg-color);
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Добро пожаловать на мой сайт!</h1>
            <nav>
                <a href="index.php">Главная</a>
                <a href="about.php">Обо мне</a>
                <a href="portfolio.php">Портфолио</a>
                <a href="contact.php">Контакты</a>
                
                <?php if (isAdmin()): ?>
                    <a href="?logout=1">Выйти</a>
                <?php endif; ?>
                
                <form method="post" class="theme-switcher">
                    <input type="hidden" name="action" value="change_theme">
                    <select name="theme" onchange="this.form.submit()">
                        <option value="light" <?= $currentTheme === 'light' ? 'selected' : '' ?>>Светлая</option>
                        <option value="dark" <?= $currentTheme === 'dark' ? 'selected' : '' ?>>Темная</option>
                    </select>
                </form>
            </nav>
        </header>

        <main>
            <!-- Секция "Обо мне" -->
            <section aria-labelledby="about-heading">
                <h2 id="about-heading">Обо мне</h2>
                <p>Привет! Меня зовут Дмитрий, я PHP-разработчик с опытом создания веб-приложений.</p>
            </section>

            <!-- Секция новостей -->
            <section aria-labelledby="news-heading">
                <h2 id="news-heading">Новости сайта</h2>
                
                <?php if (empty($news)): ?>
                    <p>Пока нет новостей.</p>
                <?php else: ?>
                    <?php foreach ($news as $item): ?>
                        <article class="news-article">
                            <h3><?= $item['title'] ?></h3>
                            <p><?= nl2br($item['content']) ?></p>
                            <time datetime="<?= date('c', $item['time']) ?>">
                                <?= date('d.m.Y H:i', $item['time']) ?>
                            </time>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
                
                <?php if (isAdmin()): ?>
                    <form method="post">
                        <input type="hidden" name="action" value="add_news">
                        <h3>Добавить новость</h3>
                        <input type="text" name="news_title" placeholder="Заголовок новости" required>
                        <textarea name="news_content" placeholder="Текст новости" rows="4" required></textarea>
                        <button type="submit">Опубликовать</button>
                    </form>
                <?php endif; ?>
            </section>

            <!-- Секция комментариев -->
            <section aria-labelledby="comments-heading">
                <h2 id="comments-heading">Комментарии к портфолио</h2>
                
                <form method="post">
                    <input type="hidden" name="action" value="add_comment">
                    <input type="text" name="author" placeholder="Ваше имя" required>
                    <textarea name="comment_text" placeholder="Ваш комментарий" rows="3" required></textarea>
                    <button type="submit">Отправить комментарий</button>
                </form>
                
                <div class="comments">
                    <?php if (empty($comments)): ?>
                        <p>Пока нет комментариев. Будьте первым!</p>
                    <?php else: ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="comment">
                                <strong><?= $comment->author ?></strong>
                                <time datetime="<?= date('c', $comment->time) ?>">
                                    <?= date('d.m.Y H:i', $comment->time) ?>
                                </time>
                                <p><?= nl2br($comment->text) ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </section>

            <!-- Секция статистики -->
            <section aria-labelledby="stats-heading">
                <h2 id="stats-heading">Статистика посещений</h2>
                <p>Этот сайт посетили: <strong><?= $visitCount ?></strong> раз</p>
            </section>

            <!-- Форма входа для администратора -->
            <?php if (!isAdmin()): ?>
                <section aria-labelledby="login-heading">
                    <h2 id="login-heading">Вход для администратора</h2>
                    <form method="post">
                        <input type="hidden" name="action" value="login">
                        <input type="text" name="username" placeholder="Имя пользователя" required>
                        <input type="password" name="password" placeholder="Пароль" required>
                        <button type="submit">Войти</button>
                    </form>
                </section>
            <?php endif; ?>
        </main>

        <footer>
            <p>&copy; 2025 Мой сайт-визитка | <a href="?rss=1">RSS-лента новостей</a></p>
        </footer>
    </div>
</body>
</html>
```
</details>

---

## Критерии оценки заданий

- **✅ Корректность выполнения** - код работает без ошибок
- **📝 Читаемость кода** - хорошие имена переменных, форматирование
- **📚 Использование изученных концепций** - применение пройденного материала
- **⚡ Оптимизация** - эффективное использование ресурсов
- **🛡️ Безопасность** - защита от основных уязвимостей

## Советы для успешного выполнения

1. Всегда тестируйте код на разных входных данных
2. Пишите комментарии для сложных участков кода
3. Используйте функции для повторяющихся операций
4. Проверяйте обработку ошибок и edge cases
5. Следуйте стандартам PSR-1 и PSR-12

