<?php

function headerText($text) {
    return "<h3 style='color: red;'>$text</h3>";
}

echo headerText("Howdy");

$kitten = "Mittens";

function changeName(&$kitten) {
    $kitten = str_replace('M', 'B', $kitten);
    echo "The cat's name is now $kitten.\n";
}

changeName($kitten);
echo "After calling changeName, the cat's name is $kitten.\n";
