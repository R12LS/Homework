<?php
class Task  
{
    private $tasks = [];

    public function addTask(string $task, bool $status = false) 
    {
        $this -> tasks[] = ["text" => $task, "status" => $status];
    }

    public function rmTask(int $index) 
    {
        unset($this -> tasks[$index]);
    }

    public function printTasks() 
    {
        foreach($this -> tasks as $task) 
        {
            echo array_search($task, $this -> tasks) . " * " . $task["text"];
            echo $task["status"] ? " *Выполнена*" : " *Не выполена*";
            echo "\n";
        }
    }

    public function setStatus(int $index, int $status) 
    {
        $this -> tasks[$index]["status"] = ($status == 0 ? false: true);
    }

    public function filter() 
    {
        usort($this -> tasks, function($a, $b) {
            return $a["status"] - $b["status"];
        });
    }

}

$tasks = new Task();
$tasks -> addTask("hello", true);
$tasks -> addTask("hello world");
$tasks -> addTask("hello best world");
$tasks -> printTasks();
$tasks -> setStatus(2, 1);
$tasks -> printTasks();
$tasks -> filter();
$tasks -> printTasks();

?>