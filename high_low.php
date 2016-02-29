<?php
$randomNumber = mt_rand(0,100);
echo "Welcome to my guessing game!\n";
echo "In this game input a number from 1 to 100.\n";
echo "The system will let you know if your getting close.\n";

fwrite(STDOUT, "Guess the number.\n");
do{
    $userFirst = fgets(STDIN);
    $userInput = trim($userFirst);

    if($userInput == $randomNumber){
        fwrite(STDOUT, "Congrats you got the right answer\n");
    }else if($userInput < $randomNumber){
        fwrite(STDOUT, "higher\n");
    }else{
        fwrite(STDOUT, "lower\n");
    }
}while($userInput != $randomNumber);
