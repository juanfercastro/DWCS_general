<?php
    //Ej 1
    function iva(float $price,int $type){
        if (!isset($type)) {
            $iva = $price * 0.21;
            echo "El iva del producto es de $iva";
        }else{
            $iva = $price * ($type/100);
            echo "El iva del producto es de $iva";
        }
    }

    //Ej 2
    function verify(string $login,string $ctr){
        if (empty($login) || empty($ctr)) {
            echo "error";
        }elseif ($login != "admin" || $ctr != "abc123."){
            echo "Usuario o contraseña incorrectos";
        }
    }

    //Ej 5
    function sum(int $num1, int $num2, int $num3, int $num4, int $num5){
        $sumatorio = $num1+$num2+$num3+$num4+$num5;
        echo "El resultado es $sumatorio";
    }

    function cilindro($radio, $altura){
        if (empty($radio) || empty($altura)) {
            echo "Faltan datos para el cálculo del volumen";
        }else{
            $volumen = 3.14 * ($radio*$radio) * $altura;
            echo "El volumen del cilindro es $volumen";
        }
    }

    function reverso(int $number){
        $cadena = (string)$number;
        $inversion = strrev($cadena);
        $numero = (int)$inversion;
        echo $numero;
    }

    function anagrama(string $cadena1, string $cadena2){
        if ($cadena1 == $cadena2 || strlen($cadena1) != strlen($cadena2)) {
            echo "las cadenas no son anagramas";
        }else{
            $array1 = str_split($cadena1);
            $array2 = str_split($cadena2);

            sort($array1);
            sort($array2);

            if ($array1 == $array2) {
                echo "Las cadenas son anagramas";
            }else{
                echo "Las cadenas no son anagramas";
            }
        }
    }

    function potencia(int $a, int $b){
        $base = $a;
        for ($i=1; $i < $b ; $i++) { 
            $a = $a * $base;
        }
        echo "El resultado es $a";
    }

    function devolucion(array $array){
        if (empty($array)) {
            echo "no existen valores en el array";
        }else{
            $mayor = max($array);
            $min = min($array);
            $suma = array_sum($array);
            $num = count($array);
            $media = $suma / $num;
            
            echo "El mayor es $mayor<br>El menor es $min<br>La media es $media";
        }
    }

    function simonDice(){
        
    }
?>