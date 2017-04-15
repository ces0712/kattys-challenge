<?php

$num = 1;
$gestor = fopen('sample.in', 'r');
$salida = fopen('sample.out', 'w');

while (fscanf($gestor, '%d%d', $number1, $number2) === 2) {
    $line = array();
    $char = array();
    $char[] = array();
    for ($i=0; $i < $number1; $i++) { 
        $line[$i] = trim(fgets($gestor)); // read file per line
        $char[$i] = str_split($line[$i]);
    }
    
    $found = 0;
    $cont = 0
    for ($key=0; $key < $number1; $key++) { 
        if ($cont === 0) {
            $search_key = array_search('-', $char[$key]);
        }
        if ($search_key >= 0 && isset($line[$key+1])) {
            if ($char[$key+1][$search_key] === '-') {
                $cont = 1;
            }else {
                $found += $cont;
                $cont = 0;
            }
        }   
    }


    $result = 'Case '.$num.': '.$found; 
    fprintf($salida, "%s\n", $result);
    $num++;
}
fclose($gestor);
fclose($salida);


?>  