<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class LoginPageCest
{

    // tests
    public function pageLoads(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/login');

        # Assert the existence of a certain element on the page
        $I->see('Log in', 'h3');
    }

    public function userNotFound(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/login');
        $I->fillField('[test=username-input]', 'aa');
        $I->fillField('[test=password-input]', 'helloworld');
        $I->click('[test=login-button]');
        $I->see('User not found', 'span');
        $message = $I->grabTextFrom('[test=message-outcome]');
        $I->comment('The message outcome is: '.$message);
    }

    public function passwordIncorrect(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/login');
        $I->fillField('[test=username-input]', 'hes');
        $I->fillField('[test=password-input]', 'aa');
        $I->click('[test=login-button]');
        $I->see('Password does not match', 'span');
        $message = $I->grabTextFrom('[test=message-outcome]');
        $I->comment('The message outcome is: '.$message);
    }

    public function loginSuccess(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/login');
        $I->fillField('[test=username-input]', 'hes');
        $I->fillField('[test=password-input]', 'helloworld');
        $I->click('[test=login-button]');
        $I->see('Log in successful', 'span');
        $message = $I->grabTextFrom('[test=message-outcome]');
        $I->comment('The message outcome is: '.$message);
    }

}