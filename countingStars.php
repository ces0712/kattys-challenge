<?php

$num = 1;
// $gestor = fopen('sample.in', 'r');
// $salida = fopen('sample.out', 'w');

while (fscanf(STDIN, '%d%d', $number1, $number2) === 2) {
    $line = array();
    $char = array();
    $char[] = array();
    $found = 0;
    $contCh = 0;
    if ($number1 > 0 && $number1 <= 100 && $number2 > 0 && $number2 <= 100) {
        for ($i=0; $i < $number1; $i++) { 
            $line[$i] = trim(fgets(STDIN)); // read file per line
            $char[$i] = str_split($line[$i]);
        }

        for ($key=0; $key < $number1; $key++) { 
            $search_key = array_search('-', $char[$key]);
            if ($search_key >= 0) {
                $valor = $key;
                break;
            }
        }

        for ($line_key=$key; $line_key < $number1; $line_key++) { 

            for ($y=0; $y < $number2; $y++) { 
                if ($char[$line_key][$y] === '-') {
                    if (isset($line[$line_key+1]) && isset($char[$line_key+1])) {
                        $cont = $line_key+1;
                        for ($i=$line_key+1; $i < $number1; $i++) { 
                            if ($char[$i][$y] === '-' && $cont === $i) {
                                $char[$i][$y] = '#';
                                $cont++;
                            }else {
                                break;
                            }

                        }
                        if($cont > $line_key+1) {        
                            // necesito comparar horizontales
                            // echo $cont.' ';
                            $found++;
                            for ($w=$line_key+1; $w < $cont; $w++) { 
                                if (isset($char[$w][$y+1])) {
                                    $contCh = $y+1;
                                    for ($c=$y+1; $c < $number2; $c++) {
                                        if ($char[$w][$c] === '-' && $contCh == $c) {
                                            $char[$w][$c] = '#';
                                            $contCh++;
                                        }else{
                                            break;
                                        }
                                    }
                                }
                            }
                            $line_key = -1;
                            break;
                        }       
                    }
                }
            }
        }
    }
    $result = 'Case '.$num.': '.$found; 
    fprintf(STDOUT, "%s\n", $result);
    $num++;
}
// fclose($gestor);
// fclose($salida);


?>  