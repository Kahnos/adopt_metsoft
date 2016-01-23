<?php

$orac='El tweet 0414-8893387 viene de correo@dom.inio.com la mascota tiene 15 años';

echo $orac.'</br></br>';

//Separar el string en palabras
$array= explode(" ",$orac);
echo print_r(array_values($array)).'</br>';

//Cantidad de palabras
$w_count = count($array);
echo 'Son '.$w_count.' palabras</br></br>';

//Funcion auxiliar para filtrar correo
function dots_mail($string){
    $aux=false;
    
    if(
        $string[0]<>'.' &&
        $string[strlen($string)-1]<>'.'
    ) {
        for ($j=1;$j<strlen($string);$j++){
            if($string[$j]=='.'){
                if($aux==true){
                    return false;
                }
                $aux=true;
            } else {
                $aux=false;
            }
        }
        return true;
    }
    return false;
}


//Funcion auxiliar para filtrar número telefónico
function nums_telf($string){
    
    if(strlen($string)<7) return false;
    
    for ($j=1;$j<strlen($string);$j++){
        if(
            ($string[$j]<'0' ||
            $string[$j]>'9') &&
            $string[$j]!='-' &&
            $string[$j]!='+'
          ){
            return false;
        }
    }
    return true;
}

//Funcion auxiliar para filtrar edad
function nums_age($string){
    
    if(strlen($string)<2) return false;
    
    for ($j=1;$j<strlen($string);$j++){
        if(
            ($string[$j]<'0' ||
            $string[$j]>'9')
          ){
            return false;
        }
    }
    return true;
}


for ($i = 0; $i < $w_count ; $i++) {
    echo $array[$i].' de '.strlen($array[$i]);
    
    //Verificar si es un correo
    if (
        //Hay un solo '@'
        strpos($array[$i],"@")!=false &&
        strpos(substr($array[$i],strpos($array[$i],"@")+1),"@")==false &&
        //Los puntos están ubicados correctamente
        dots_mail(substr($array[$i],strpos($array[$i],"@")+1))
        )
    {
        echo " Esto es un correo";
    }
    
    //Verificar si es un telefono
    if (
        nums_telf($array[$i])
        )
    {
        echo " Esto es un telefono";
    }
    
    //Verificar si es la edad
    if (
        $i< $w_count - 1 &&
        $array[$i+1] == 'años' &&
        nums_age($array[$i])
    )
    {
        echo " Esta es la edad";
    }
    echo '</br>';
}

    /*
    *   Function that checks if the tweet contains information about vaccines.
    +   Input = The tweet to check.
    *   Returns = True if the animal is vaccinated, False if not.
    */
    function extractVaccine ($tweet){
        $lowerTweet = strtolower($tweet);
        $wordArray = explode(" ", $lowerTweet);
        $count = 0;
        foreach ($wordArray as $word) {
            if ( (strstr($word, "vacuna")) || (similar_text($word, "vacuna") >= 4) ){
                if ($count >= 2){
                    if (($wordArray[$count-1] != "no") &&
                        ($wordArray[$count-2] != "no") &&
                        ($wordArray[$count-1] != "sin") &&
                        !(strstr("falta", $wordArray[$count-1])))
                    {
                        return 1;
                    }
                }
            }
            $count++;
        }
        return 0;
    }


?>