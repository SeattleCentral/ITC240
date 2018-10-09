<?php

$answer = random_int(1, 10);

echo "Guess a number between 1 and 10.\n";

while ($answer != ($userAnswer = fgets(STDIN))) {
    if ($userAnswer > $answer) {
        echo "Too high!\n";
    } else {
        echo "Too low!\n";
    }
    echo "That's not right! Guess again.\n";
    
}
echo "You guessed it right! The answer is $answer.\n";