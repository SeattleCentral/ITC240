<?php


class Dice
{
    protected $numberOfSides = 6;
    private $currentValue;
    
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
        $this->currentValue = random_int(1, $this->numberOfSides);
    }
    
    public function draw() {
        // ToDo: Make HTMLL repr from current value.
    }
}


class BoardGameDice extends Dice 
{
    protected $numberOfSides = 20;
}



$myDie = new Dice();
$myFancyDie = new BoardGameDice();
echo "My die's current value is: " . $myDie->getCurrentValue() . "\n";
echo "My fancy die's current value is: " . $myFancyDie->getCurrentValue() . "\n";

$myDie->setCurrentValue(1);

echo "My die's current value is: " . $myDie->getCurrentValue() . "\n";
