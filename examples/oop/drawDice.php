<?php


class Dice
{
    protected $numberOfSides = 6;
    private $currentValue;
    protected $diceMap = [
        1 => [
            [0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0],
            [0, 0, 1, 0, 0],
            [0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0]
        ],
        2 => [
            [0, 0, 0, 0, 0],
            [0, 1, 0, 0, 0],
            [0, 0, 0, 0, 0],
            [0, 0, 0, 1, 0],
            [0, 0, 0, 0, 0]
        ],
        3 => [
            [0, 0, 0, 0, 1],
            [0, 0, 0, 0, 0],
            [0, 0, 1, 0, 0],
            [0, 0, 0, 0, 0],
            [1, 0, 0, 0, 0]
        ],
        4 => [
            [0, 0, 0, 0, 0],
            [0, 1, 0, 1, 0],
            [0, 0, 0, 0, 0],
            [0, 1, 0, 1, 0],
            [0, 0, 0, 0, 0]
        ],
        5 => [
            [0, 0, 0, 0, 0],
            [0, 1, 0, 1, 0],
            [0, 0, 1, 0, 0],
            [0, 1, 0, 1, 0],
            [0, 0, 0, 0, 0]
        ],
        6 => [
            [0, 1, 0, 1, 0],
            [0, 0, 0, 0, 0],
            [0, 1, 0, 1, 0],
            [0, 0, 0, 0, 0],
            [0, 1, 0, 1, 0]
        ]
    ];
    
    public function __construct() {
        $this->roll();
    }
    
    public function getCurrentValue() {
        return $this->currentValue;
    }
    
    public function setCurrentValue($newValue) {
        if (is_numeric($newValue)) {
            if ($newValue >= 1 && $newValue <= $this->numberOfSides) {
                $this->currentValue = $newValue;
            }
        }
    }
    
    public function roll() {
        $this->setCurrentValue(random_int(1, $this->numberOfSides));
    }
    
    public function draw() {
        // Implement here.
    }
}


class BoardGameDice extends Dice 
{
    protected $numberOfSides = 20;
}

$myDie = new Dice();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dice Roller!</title>
    <style type="text/css">
        table {
            border-spacing: 0;
            border-collapse: collapse;
        }
        tbody {
            border: 1px solid #CCC;
        }
        td {
            width: 20px;
            height: 20px;
            border: 0;
            background-color: #FFF;
        }
        
        .fill {
            background-color: #000;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1>Acme Dice Roller!</h1>
    
    <table>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td class="fill"></td>
                <td></td>
                <td class="fill"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td class="fill"></td>
                <td></td>
                <td class="fill"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>
</html>

