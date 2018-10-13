<?php

echo "\n".
     "Welcome to the Mystical World of Everbridge!\n".
     "============================================\n\n";
     
echo "To start your journey, press [Enter]\n";
$answer = fgets(STDIN);
level1($answer);

function level1($answer) {
    switch ($answer) {
        case 1:
            echo "You died of dysentery.\n";
            break;
        case 2:
            echo "Your move beat the gnome\n";
            level2();
            break;
        default:
            echo "You are stopped by a gnome at the bridge.\n".
                 "Do you [1] Wait, or [2] Fight it? ";
            level1(fgets(STDIN));
    }
}

function level2() {
    echo "\n".
         "============================\n".
         "| You won! Congratulations |\n".
         "============================\n";
}