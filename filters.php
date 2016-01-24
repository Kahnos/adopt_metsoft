<?php
    /**
     * Calls all the verify functions in order.
     * @author José Díaz
     * @param String $tweet contains the tweet to check.
     */
    function verifyAll ($tweet){
        verifyMail($tweet);
        verifyTelephone($tweet);
        verifyAge($tweet);
        verifyVaccine($tweet);
        verifyNeutered($tweet);
        verifyRace($tweet);
    }

    /**
     * Checks if a tweet contains an e-mail.
     * @author Jesús Castro
     * @param  String $tweet contains the tweet to check.
     * @return String with an e-mail if it contains one, 0 if it doesn't.
     */
    function verifyMail ($tweet){
        $lowerTweet = strtolower($tweet);
        $wordArray = explode(" ", $lowerTweet);

        foreach ($wordArray as $word){
            //Verificar si es un correo
            if (
                //Hay un solo '@'
                strpos($word, "@") != false &&
                strpos(substr($word, strpos($word, "@") + 1), "@") == false &&
                //Los puntos están ubicados correctamente
                checkDots( substr($word, strpos($word, "@")+1) )
            )
            {
                echo "Esto es un correo: " . $word . "</br>";
                return $word;
            }
        }
        return 0;
    }

    /**
     * Auxiliary function to check the dots in an e-mail are valid. Used in verifyMail.
     * @author Jesús Castro
     */
    function checkDots ($string){
        $aux = false;

        if( $string[0] <> '.' &&
           $string[strlen($string) - 1] <> '.' ) {
            for ($j=0; $j < strlen($string); $j++) {
                if ($string[$j] == '.') {
                    if ($aux == true) {
                        return false;
                    }
                    $aux = true;
                } else {
                    $aux = false;
                }
            }
            return true;
        }
        return false;
    }

    /**
     * Checks if a tweet contains a telephone number.
     * @author Jesús Castro
     * @param  String $tweet contains the tweet to check.
     * @return String with a telephone number if it contains one, 0 if it doesn't.
     */
    function verifyTelephone ($tweet){
        $lowerTweet = strtolower($tweet);
        $wordArray = explode(" ", $lowerTweet);

        foreach ($wordArray as $word){
            if (strlen($word) >= 7){
                $word = trim($word, '.,');
                $aux = true;
                for ($j=0; $j < strlen($word); $j++){
                    if ( ( ($word[$j] < '0') || ($word[$j] > '9') ) &&
                        ($word[$j] != '-') &&
                        ($word[$j] != '+') ){
                        $aux = false;
                    }
                }
                if($aux == true){
                    echo "Esto es un teléfono: " . $word . "</br>";
                    return $word;
                }
            }
        }
        return 0;
    }

    /**
     * Checks if a tweet contains an age.
     * @author Jesús Castro
     * @param  String $tweet contains the tweet to check.
     * @return String with the age if it contains one, 0 if it doesn't.
     */
    function verifyAge ($tweet){
        $lowerTweet = strtolower($tweet);
        $wordArray = explode(" ", $lowerTweet);
        $count = 0;
        $wordArraylength = count($wordArray);

        foreach ($wordArray as $word){
            if ( $count < ($wordArraylength - 1) ){
                $word = trim($word, '.,');
                if ((strlen($word) <= 2) &&
                    (strlen($word) > 0) &&
                    (strstr($wordArray[$count + 1], "años"))
                   ){
                    $aux = true;
                    for ($j=0; $j < strlen($word); $j++){
                        if (($word[$j] < '0') ||
                            ($word[$j] > '9')){
                            $aux = false;;
                        }
                    }

                    if($aux == true)
                        echo "Esto es una edad: " . $word . "</br>";
                        return $word;
                }
                $count++;
            }
        }
        return 0;
    }

    /**
     * Checks if the tweet contains information about vaccines.
     * @author José Díaz
     * @param  String $tweet The tweet to check.
     * @return 1 if animal is vaccinated, 0 if not.
     */
    function verifyVaccine ($tweet){
        $lowerTweet = strtolower($tweet);
        $wordArray = explode(" ", $lowerTweet);
        $count = 0;
        foreach ($wordArray as $word) {
            $word = trim($word, '.,');
            if ( (strstr($word, "vacuna")) || (similar_text($word, "vacuna") >= 5) ){
                if ($count >= 2){
                    if (($wordArray[$count-1] != "no") &&
                        ($wordArray[$count-1] != "ni") &&
                        ($wordArray[$count-2] != "no") &&
                        ($wordArray[$count-1] != "sin") &&
                        !(strstr("falta", $wordArray[$count-1])))
                    {
                        echo "Sí está vacunado, en la palabra: " . $word . "</br>";
                        return 1;
                    }
                }
            }
            $count++;
        }
        return 0;
    }

    /**
     * Checks if the tweet contains information about neutered animals.
     * @author José Díaz
     * @param  String $tweet The tweet to check.
     * @return 1 if animal is neutered, 0 if not.
     */
    function verifyNeutered ($tweet){
        $lowerTweet = strtolower($tweet);
        $wordArray = explode(" ", $lowerTweet);
        $count = 0;
        foreach ($wordArray as $word) {
            $word = trim($word, '.,');
            if ( (strstr($word, "castrado")) || (similar_text($word, "castrado") >= 6) || (strstr($word, "esteril")) || (strstr($word, "capado")) ) {
                if ($count >= 2){
                    if (($wordArray[$count-1] != "no") &&
                        ($wordArray[$count-1] != "ni") &&
                        ($wordArray[$count-2] != "no") &&
                        ($wordArray[$count-1] != "sin") &&
                        !(strstr("falta", $wordArray[$count-1])))
                    {
                        echo "Sí está castrado, en la palabra: " . $word . "</br>";
                        return 1;
                    }
                }
            }
            $count++;
        }
        return 0;
    }

    /**
     * Checks if the tweet contains information about a specific race.
     * @author José Díaz
     * @param  String $tweet The tweet to check.
     * @return String with the dogs race, 0 if not found.
     */
    function verifyRace ($tweet){
        $lowerTweet = strtolower($tweet);
        $wordArray = explode(" ", $lowerTweet);
        $wordArray = array_map('trimArray', $wordArray);    // Applies trimArray() to all the strings in the array.
        $wordArraylength = count($wordArray);
        $count = 0;
        $races = readRacesFile();

        foreach ($wordArray as $word) {
            $count2 = 1;

            foreach ($races as $race){
                if ( ($count2 <= 12) && ($count < ($wordArraylength - 1)) ){
                    $raceAuxArray = explode(" ", $race);
                    $raceLength1 = strlen($raceAuxArray[0]);
                    $raceLength2 = strlen($raceAuxArray[1]);
                    $percent = 0;

                    if ($raceLength1 <= 4){
                        if ( (similar_text($word, $raceAuxArray[0]) >= 3) ){    // Checks similarity in the first word of the race.
                            if ($raceLength2 <= 4){
                                if (similar_text($wordArray[$count + 1], $raceAuxArray[1]) >= 3){   // Checks similarity in the second word of the race.
                                    echo "La raza es: " . $race . " en la palabra " . $word . " " . $wordArray[$count + 1] . "</br>";
                                    return $race;
                                }
                            }
                            else{
                                similar_text($wordArray[$count + 1], $raceAuxArray[1], $percent);   // Stores in $percent the percentage of similarity between the word and the second word of the race.

                                if ( $percent >= 70 ){    // Checks similarity in the second word of the race is at least of 70%.
                                    echo "La raza es: " . $race . " en la palabra " . $word . " " . $wordArray[$count + 1] . "</br>";
                                    return $race;
                                }
                            }
                        }
                    }
                    else{
                        similar_text($word, $raceAuxArray[0], $percent);    // Stores in $percent the percentage of similarity between the word and the first word of the race.

                        if ( $percent >= 70 ){    // Checks similarity in the first word of the race is at least of 70%.
                            if ($raceLength2 <= 4){
                                if (similar_text($wordArray[$count + 1], $raceAuxArray[1]) >= 3){   // Checks similarity in the second word of the race.
                                    echo "La raza es: " . $race . " en la palabra " . $word . " " . $wordArray[$count + 1] . "</br>";
                                    return $race;
                                }
                            }
                            else{
                                similar_text($wordArray[$count + 1], $raceAuxArray[1], $percent);   // Stores in $percent the percentage of similarity between the word and the second word of the race.

                                if ( $percent >= 70 ){    // Checks similarity in the second word of the race is at least of 70%.
                                    echo "La raza es: " . $race . " en la palabra " . $word . " " . $wordArray[$count + 1] . "</br>";
                                    return $race;
                                }
                            }
                        }
                    }
                }
                elseif ($count2 > 12){
                    $raceLength = strlen($race);

                    if ($raceLength <= 4){
                        if (similar_text($word, $race) >= 3){   //  Checks similarity between the word and the race.
                            echo "La raza es: " . $race . " en la palabra " . $word . "</br>";
                            return $race;
                        }
                    }
                    else{
                        similar_text($word, $race, $percent);    // Stores in $percent the percentage of similarity between the word and race.

                        if ( $percent >= 70 ){    //  Checks similarity between the word and the race is at least of 70%.
                            echo "La raza es: " . $race . " en la palabra " . $word . "</br>";
                            return $race;
                        }
                    }
                }
                $count2++;
            }
            $count++;
        }
        return 0;
    }

    /**
     * Auxialiary function that trims the received string and removes ',' and '.'
     * @author José Díaz
     * @param String $arrayString The string to trim
     */
    function trimArray($arrayString){
        return trim($arrayString, '.,');
    }

    /**
     * Reads a file (called dog_races.txt at root folder) with a list of dog races, stores it in an array and returns it.
     * @author José Díaz
     * @return Array containing a list of dog races, each index contains a single race.
     */
    function readRacesFile (){
        $racesFile = fopen("dog_races.txt", "r") or die("Failed opening dog_races.txt");

        $races = array();
        while( !feof($racesFile) ) {
            array_push($races, strtolower(trim(fgets($racesFile))));
        }

        fclose($racesFile);
        return $races;
    }
?>
