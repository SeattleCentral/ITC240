<?php 

require 'greeter.php';

class GreeterFunctionsCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function testGreeterFunction(UnitTester $I)
    {
        $sallyResult = greeter("Sally");
        $I->assertEquals($sallyResult, "Hello, Sally. Welcome to my site.");
        $bobResult = greeter("Bob");
        $I->assertEquals($bobResult, "Hello, Bob. Welcome to my site.");
    }
}
