<?php 
// 1.1

print_r("qq \n");  
print_r(date("Y m d h i s")); 

// 1.2

while (True){ 
    $bday = (int) readline("input ur year of birthday \n");  

    if ($bday >= 1990 && $bday <= 2015) {
        break; 
    }
    echo 'peredelivay';
}

function eighteen($bday): bool { 
    if (date("Y") - $bday >= 18){
        return True;
     }
    
        return false; 
     
}; 

print_r (date("Y") - $bday); 
echo "\n"; 

// 2.1

$i = 1;
$f = 1.0;  
$s = 'gg'; 
$b = false;
$a = [$i, $f, $s, $b]; 

echo (gettype($i) . "\n");
echo ("1" + 1.3 . "\n"); 

//2.2 
$cel = 36.5; 
function celToFar($cel): float{ 
    return round($cel*(9/5) + 32, 2); 
};
function celToKel($cel): float{ 
    return round($cel + 273.15, 2); 
}

// 3.1

if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $mark = (int)($_POST["mark"]); 
    if ($mark > 5 or $mark < 1 ){ 
        echo 'peredelivay'; 
    }
}
switch ($mark){ 
    case 1: echo 'odin'; 
    case 2: echo 'dva'; 
    case 3: echo 'tri'; 
    case 4: echo 'chetire';
    case 5: echo 'pyat'; 
    case 52: echo 'pisyat dva йоу'; 
}


//4.2 
$len = 8; 

function randPasswordGenerate($len): string{ 
    $i = 3; 
    $res = (string) chr(rand(48, 57)) . chr(rand(65, 90)) . chr (rand(97,122));  
    while ($i != $len){ 
        $r = rand(1, 3); 
        if ($r == 1){ 
            $res .= chr(rand(65, 90)); 
        }
        else if ($r == 2) { 
            $res .= chr(rand(97,122));  
        }
        else{ 
            $res .= chr(rand(48, 57)); 
        }
        $i++; 
    }
    return str_shuffle($res); 
}
