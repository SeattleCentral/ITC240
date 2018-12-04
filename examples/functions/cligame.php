<?php

echo "\n".
     "Welcome to the Mystical World of Everbridge!\n".
     "============================================\n\n";
     
echo "To start your journey, press [Enter]\n";
fgets(STDIN);
level1();

function level1($answer=null) {
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

function level2($answer=null) {
    switch ($answer) {
        case 1:
            echo "You died of dysentery.\n";
            break;
        case 2:
            echo "Go back to where you were.\n";
            level1();
            break;
        case 3:
            echo "Great spell! The road is clear.\n";
            finish();
            break;
        default:
            echo "You come across a road block.\n".
                 "Do you [1] Wait, [2] Turn around, [3] Cast a spell? ";
            level2(fgets(STDIN));
    }
}

function finish() {
    echo "\nYou have reached the conclusion of your journey. Congratulations!\n\n";
}