<!DOCTYPE html>
<html>
<head>
    <title>Quiz App</title>
</head>
<body>
    <?php
    $questionsFromDB = [
        "Is PHP cool?" => [
            "A" => "Yes",
            "B" => "No",
            "C" => "Maybe",
            "D" => "All of the above"
        ],
        "What is the best fruit?" => [
            "A" => "Apple",
            "B" => "Pineapple",
            "C" => "Pumpkin",
            "D" => "Watermelon"
        ]
    ];
    ?>
    
    <h1>Quiz</h1>
    
    <form>
        <?php foreach($questionsFromDB as $question => $answers): ?>
            <p>
                <label>
                    <?php echo $question; ?>
                </label>
                <select>
                    <?php foreach($answers as $val => $text): ?>
                        <option value="<?php echo $val; ?>">
                            <?php echo $text; ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </p>
        <?php endforeach ?>
    </form>
    
</body>
</html>