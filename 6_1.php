<?php
class Students 
{
    private $students = [];

    public function addStudents(string $name, int $age, int $grade) 
    {
        $this -> students[] = ["name" => $name, "age" => $age, "grade" => $grade];
    }

    public function echoStudents() 
    {
        foreach ($this -> students as $student) 
            {
            echo "Name: " . $student['name'] . " Age: " . $student['age'] . " Grade: " . $student['grade'];
            echo "\n";
        }
    }

    public function findStident(string $name) 
    {
        foreach ($this -> students as $student) 
            {
            if (strtolower($student["name"]) == strtolower($name)) 
                {
                echo "The found student: ";
                echo "Name: " . $student['name'] . " Age: " . $student['age'] . " Grade: " . $student['grade'];
                echo "\n";
            }
        }
    }

    public function sortStudens() 
    {
        usort($this -> students, function($a, $b) 
        {
            return $a['age'] - $b['age'];
        });
    }
}

$students = new Students();
$students -> addStudents("Bob", 15, 1);
$students -> addStudents("Add", 30, 2);
$students -> addStudents("Anny", 25, 3);
$students -> echoStudents();
$students -> findStident("Add");
$students -> sortStudens();
$students -> echoStudents();
?>