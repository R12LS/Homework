## task 1.1
``` bash
    	echo "Hello, world! Привет! \n";
    	echo "today is " . date ('d.m.Y.') . "\n";
    	echo "now " . date ('H:i:s') . "\n"; 
    	
```
## task 1.2
``` bash
 $was_born = readline("write your year of born");
    $now_year = date('Y');
    $age = $now_year - $was_born;
    echo "you are: " . $age . "\n";
    if ($age > 17){
        $adult = true;
    }   
    else{
        $adult = false;
    }
    $status = ($adult)? "adult" : "minor";
    echo "You are: " . $status . "\n";
```
## task 2.1
``` bash
 $peremenie = [
        $int = 5,
        $float = 5.213,
        $string = "string",
        $null = null,
        $boolenear = true,
        $array = [1, 2, 3 ],
        ];
    foreach ($peremenie as $value){
        echo "type: " . gettype($value) . " - " . $value . "\n";
    }
    $string_number = "123";
    $number = (int)$string_number;
    echo "switch: " . $string_number . "->" . $number . "\n";
```
## task 2.2
```bash
 $celsii = readline("write temperature in celsii");
    $celvin = $celsii + 273.15;
    $farengeit = ($celsii * 9/5) + 32;
    echo "in farengeit: " . round($farengeit,2) . "\n";
    echo "in kelvin: " . round($celvin,2) . "\n"; 
```
## task 3.1
``` bash
 $grade = readline("write your grade 1-5");
    if($grade == 5){
        echo "your grade: " . $grade . " excellent";
    } elseif($grade == 4){
        echo "your grade: " . $grade . " good";
    } elseif($grade == 3){
        echo "your grade: " . $grade . " normal";
    } elseif($grade == 2){
        echo "your grade: " . $grade . " bad";
    } else{
        echo "your grade: " . $grade . " very bad";
    }
    echo "\n";
```
## task 3.2
``` bash 
$weight = readline("write your weight(kg)");
    $height = readline("write your height(m)");
    $imt = round($weight/($height**2),1);
    echo "Yor bmi: " . $imt . "\n";
    if ($imt < 18.5){
        echo "You need more eat and training ";
    } elseif ($imt > 25){
        echo "You need diet and training ";
    } else {
        echo "You are good";
    }
    echo "\n";
```
## task 4.1 
```bash
$tablica = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
echo "<table>";
foreach ($tablica as $value) {
    echo "<tr>";
    foreach ($tablica as $value2) {
        $result = $value * $value2;
        echo  "<td>" . $result . " </td>";
    }
    echo "</tr> \n";
}
echo "</table>";
```
## task 5.1
``` bash
 function plus($a, $b){
        return $a + $b;
    }
    function minus($a, $b){
        return $a - $b;
    }
    function umnoj($a, $b){
        return $a * $b;
    }
    function del($a, $b){
        return $a / $b;
    }
    function factorial($n){
        if($n <=1) {
            return 1;
        } else{
            return $n * factorial($n-1);
        }
        
        
    }
    echo umnoj(5, 4) . "\n" . del(7,2) . "\n" . factorial(0) . "\n";
```

