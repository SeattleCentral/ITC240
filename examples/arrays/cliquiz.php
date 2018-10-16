<?php

$questions = [
    "What do you call a key:value array in PHP?" => [
        "Associative Array" => true,
        "Simple Array" => false,
        "Dictionary" => false,
        "Lock Type" => false
    ],
    "What is the symbol for pass by reference?" => [
        "&" => true,
        "*" => false,
        ";-)" => false,
        "%" => false
    ]
];

echo "Welcome to Quiz 01\n";
echo "==================\n\n";

$correct = 0;

foreach ($questions as $question => $options) {
    echo $question."\n";
    $isCorrect = askForAnswer($options);
    if ($isCorrect) {
        $correct++;
        echo "Correct! Good job.\n";
    }
    echo "\n";
}

echo "Your grade is ". $correct / count($questions) * 100 . "%\n\n";

function askForAnswer($options) {
    kshuffle($options);
    $position = 1;
    $optionAnswers = [];
    foreach ($options as $option => $correct) {
        echo "[$position] $option\n";
        $optionAnswers[$position] = $correct;
        $position++;
    }
    echo "Your answer: ";
    $userAnswer = (int) fgets(STDIN);
    return $optionAnswers[$userAnswer];
}

function kshuffle(&$array) {
    $tmp = [];
    foreach($array as $key => $value) {
        $tmp[] = ['k' => $key, 'v' => $value];
    }
    shuffle($tmp);
    $array = [];
    foreach($tmp as $entry) {
        $array[$entry['k']] = $entry['v'];
    }
    return true;
}