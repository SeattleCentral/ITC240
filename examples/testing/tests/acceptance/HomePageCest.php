<?php 

class HomePageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function testHomePageHeader(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->canSee("Welcome to My Site");
    }
    
    public function testSearchLabel(AcceptanceTester $I)
    {
        $I->amOnPage('/?search=puppies');
        $I->canSee("You searched for: puppies");
        $I->amOnPage('/?search=kittens');
        $I->canSee("You searched for: kittens");
    }
}
