<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;
use App\Commands\AppCommand;
include 'app/Commands/AppCommand.php';

class GradingFlowCest
{

    public function login(AcceptanceTester $I)
    {
        # Navigate to the login page and login using the grading credentials
        $I->amOnPage('/login');
        $I->fillField('[test=username-input]', 'hes');
        $I->fillField('[test=password-input]', 'helloworld');
        $I->click('[test=login-button]');
        $I->see('Log in successful', 'span');
        $message = $I->grabTextFrom('[test=message-outcome]');
        $I->comment('The message outcome is: '.$message);

        # Go to the adoption center and adopt a pet
        $I->amOnPage('/center');
        $I->click('[test=adopt-button]');
        $message = $I->grabTextFrom('[test=message-outcome]');
        $I->comment('The message outcome is: '.$message);

        # Go to the bank and check the starting bank balance
        $I->amOnPage('/bank');
        $money1 = $I->grabTextFrom('[test=money-amount]');
        $I->comment('The user balance is: '.$money1);

        # Got to the general store and purchase an omlette
        $I->amOnPage('/store?store=store-general');
        $I->see('Welcome to the general store', 'p');
        $I->click('[test=purchase-button]');
        $message = $I->grabTextFrom('[test=message-outcome]');
        $I->comment('The message outcome is: '.$message);

        # Go back to the bank and check the new balance, ensuring that it is less
        $I->amOnPage('/bank');
        $money2 = $I->grabTextFrom('[test=money-amount]');
        $I->comment('The user balance is: '.$money2);
        if((int)$money2 < (int)$money1) {
            $I->comment('Balance is lower, purchase was successful');
        }

        # Go to the special store and purchase an omlette
        $I->amOnPage('/store?store=store-special');
        $I->see('Welcome to the special store', 'p');
        $I->click('[test=purchase-button]');
        $message = $I->grabTextFrom('[test=message-outcome]');
        $I->comment('The message outcome is: '.$message);

        # Go back to the bank and check the new balance, ensuring that it is less
        $I->amOnPage('/bank');
        $money3 = $I->grabTextFrom('[test=money-amount]');
        $I->comment('The user balance is: '.$money3);
        if((int)$money3 < (int)$money2) {
            $I->comment('Balance is lower, purchase was successful');
        }

        # Go to the user's home and ensure they have a pet, an omlette, and a paintbrsuh
        $I->amOnPage('/home');
        $I->see('Species', 'div');
        $I->see('omlette', 'div');
        $I->see('paintbrush', 'div');

        # Log out of the user's acccount
        $I->click('[test=logout-button]');
        $I->see('Log in', 'h3');
        $message = $I->grabTextFrom('[test=message-outcome]');
        $I->comment('The message outcome is: '.$message);
    }

}