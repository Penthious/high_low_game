<?php
fwrite(STDOUT, "What game will you like to play? 1 or 2\n");
$gameInput = fgets(STDIN);
$gameMode = trim($gameInput);
$valueOne = $argv[1];
$valueTwo = $argv[2];
$minValue = 0;
$maxValue = 100;
if(is_numeric($valueOne) && is_numeric($valueTwo)){
    if ($valueOne < $valueTwo){
        $minValue = $valueOne;
        $maxValue = $valueTwo;
    }else if($valueOne > $valueTwo){
        echo " Was expecting arg[1] < arg[2] system will use default settings\n";
    }
}else {
    echo "System was expecting numeric values, will use default settings\n";
}


    if($gameMode == "1"){
    $randomNumber = mt_rand($minValue,$maxValue);
    echo "Welcome to my guessing game!\n";
    echo "In this game input a number from {$minValue} to {$maxValue}.\n";
    echo "The system will let you know if your getting close.\n";
    $guessCount = 0;
    $gameCount  = 0;
    fwrite(STDOUT, "Guess the number.\n");
    do{
        echo 'Number of guesses: ' . $guessCount++ .PHP_EOL;
        $userFirst = fgets(STDIN);
        $userInput = trim($userFirst);
        if(is_numeric($userInput)){
            if($userInput == $randomNumber){
                fwrite(STDOUT, "Congrats you got the right answer\n");
                fwrite(STDOUT, "Do you want to play agian (yes/no)\n");
                $userInput = trim(fgets(STDIN));
                if($userInput == "yes" || $userInput == "y"){
                    echo "\033c";
                    $gameCount++;
                    echo "Page has been refreshed";
                    sleep(1);
                    echo "\r You have played this game {$gameCount} times now\n";
                    $userInput    = 0;
                    $randomNumber = mt_rand(0,100);
                    $guessCount   = 0;
                }
            }else if($userInput < $randomNumber){
                fwrite(STDOUT, "higher\n");
            }else{
                fwrite(STDOUT, "lower\n");
            }
        }else{
            echo "Enter a number Value\n";
        }
    }while($userInput != $randomNumber);
}else if($gameMode = "2"){
    echo "Welcome to the computer guessing game.\n";
    echo "In this game mode you input the number\n";
    echo "Then the computer will guess the number you picked\n";
    fwrite(STDOUT,"Enter a number from 1 to 100\n");
    $userValue  = fgets(STDIN);
    $userNumber = trim($userValue);
    $minCount   = 0;
    $maxCount   = 100;
    $newGame    = "";
    $gameCount  = 0;
    do{
        $computerGuess = rand($minCount, $maxCount);
        if($computerGuess < $userNumber){
            echo "The current computer guess is {$computerGuess}\n";
            $minCount = $computerGuess +1;
            echo "------------------------\n";
        }else if($computerGuess > $userNumber){
            echo "The current computer guess is {$computerGuess}\n";
            $maxCount = $computerGuess -1;
            echo "------------------------\n";
        }else{
            echo "The computer guessed right with the number of {$computerGuess}\n";
            fwrite(STDOUT, "Do you want the computer to guess again?(yes or no)\n");
            $newGame = trim(fgets(STDIN));
            if($newGame == "yes" || $newGame == "y"){
                $minCount      = 0;
                $maxCount      = 100;
                $computerGuess = 0;
                echo "\033c";
                $gameCount++;
                echo "Page has been refreshed";
                sleep(1);
                echo "\r You have played this game {$gameCount} times now\n";
                fwrite(STDOUT,"Enter a number from 1 to 100\n");
                $UserNumber = trim(fgets(STDIN));
            }else if($newGame == "no" || "n"){
                echo "\033c";
                fwrite(STDOUT, "What game will you like to play? 1 or 2\n");
                $gameInput = fgets(STDIN);
                $gameMode = trim($gameInput);
            }
        }

    }while($computerGuess != $userNumber);
}

