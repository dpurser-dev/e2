*Any instructions/notes in italics should be removed from the template before submitting* 

# Project 3
+ By: David Purser
+ URL: http://e2p3.dpurser.me

## Graduate requirement
+ [x] I have integrated testing into my application
+ [ ] I am taking this course for undergraduate credit and have opted out of integrating testing into my application

## Outside resources
This application was inspired by the early 2000's version of [Neopets](https://www.neopets.com/). Neopets is a browser-based HTML game where users can adopt a pet and care for it by feeding and playing with it. 

Additional details for outside resources are provided below:

+ Visual assets for my application were created using MidJourney AI Image Generator with a paid subscription.
+ Web fonts were provided by [Google Fonts](https://fonts.google.com/) (Dosis)
+ Logo was designed using Adobe Photoshop 2022 with an HES student licence using the "Boho Babe" font ([link](https://www.dafont.com/boho-babe.font)) under a "Personal Use" licence
+ Website template derived from the [Bootstrap Framework](https://getbootstrap.com/) 
+ Backend framework used was the [e2framework](https://github.com/susanBuck/e2framework)

## Notes for instructor
To facilitate grading, some user credentials have been provisioned. Please use the following:

**Username:** hes

**Password:** helloworld

The recommending flow for grading is as follows:
1. Try to access the home page, only to be redirected to the login screen (as you are not logged in by default)
2. Log in using the provided credentials
3. Take note of the TecheMono date and weather (this is dynamically generated)
4. Navigate around the world of Techemodo using the dropdown menu
5. Go to the adoption centre and adopt a pet (available pets are randomly generated, according to their rarity - refresh the page to try your luck at an ultra rare)
6. Go to the bank to check your account balance
7. Go to the general store to buy your pet some food (they only eat omelettes) - story inventory is also randomly generated
8. Go to the special store to buy a paint brush (I have given the grading account  heaps of TecheMoney so you can afford this end-game content)
9. Go to your home to view your pet and items

### Development backlog
Some additional features that I plan to include in future releases are listed below:
+ Name a pet at the time of adoption (note: this field already exists in the database)
+ Pets to have changing hunger and happiness levels (note: these fields already exists in the database)
+ Paint pet to change its appearance (note: visual assets have been prepared for this)
+ Earn more TecheMoney (e.g., by visiting the site on consecutive days, etc.)

## Grading checklist
+ [x] **Routes**: App contains 10+ routes
+ [x] **Controllers**: App contains controllers with advanced logic (e.g., login functionality)
+ [x] **Views** (using Blade templating): App features 6 views, with master template and URL parameters
+ [x] **Databases**: App uses SQL database as part of the LEMP stack
+ [x] **At least 1 table**: App features 7 tables, with relationships between them(e.g. pet ownership table linking pet and user)
+ [x] **Create interaction** (e.g. saving results for each round): App contains many 'create' database interactions (e.g., adoption a pet)
+ [x] **Read interaction** (e.g. showing the results for each round): App contians many 'read' database interactions (e.g., viewing user home page) 
+ [x] **Migrations/seeds via Commands**: App has 6 migration/seed commands, and an additional seedAll() function to run all
+ [x] **Must use the $app->db() method for all database interactions**: Done
+ [x] **Form validation** - where applicable, form inputs should be validated. At minimum, at least 1 input must be validated: Login and navigation forms use the built-in validate() method, other (more customised) validation logic is coded manually

+ [x] **Testing for graduate requirement**: Tests have been developed for the login permutations, as well as for the full user jounrey described in the **recommended flow for grading**

## Codeception testing output
```
Codeception PHP Testing Framework v5.0.12 https://stand-with-ukraine.pp.ua

Tests.Acceptance Tests (5) --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
GradingFlowCest: Login
Signature: Tests\Acceptance\GradingFlowCest:login
Test: tests/Acceptance/GradingFlowCest.php:login
Scenario --
 I am on page "/login"
 I fill field "[test=username-input]","hes"
 I fill field "[test=password-input]","helloworld"
 I click "[test=login-button]"
 I see "Log in successful","span"
 I grab text from "[test=message-outcome]"
 The message outcome is: Log in successful
 I am on page "/center"
 I click "[test=adopt-button]"
 I grab text from "[test=message-outcome]"
 The message outcome is: You already have a pet!
 I am on page "/bank"
 I grab text from "[test=money-amount]"
 The user balance is: 5850 tm
 I am on page "/store?store=store-general"
 I see "Welcome to the general store","p"
 I click "[test=purchase-button]"
 I grab text from "[test=message-outcome]"
 The message outcome is: Purchase successful
 I am on page "/bank"
 I grab text from "[test=money-amount]"
 The user balance is: 5770 tm
 Balance is lower, purchase was successful
 I am on page "/store?store=store-special"
 I see "Welcome to the special store","p"
 I click "[test=purchase-button]"
 I grab text from "[test=message-outcome]"
 The message outcome is: Purchase successful
 I am on page "/bank"
 I grab text from "[test=money-amount]"
 The user balance is: 3770 tm
 Balance is lower, purchase was successful
 I am on page "/home"
 I see "Species","div"
 I see "omlette","div"
 I see "paintbrush","div"
 I click "[test=logout-button]"
 I see "Log in","h3"
 I grab text from "[test=message-outcome]"
 The message outcome is: Log out successful
 PASSED 

LoginPageCest: Page loads
Signature: Tests\Acceptance\LoginPageCest:pageLoads
Test: tests/Acceptance/LoginPageCest.php:pageLoads
Scenario --
 I am on page "/login"
 I see "Log in","h3"
 PASSED 

LoginPageCest: User not found
Signature: Tests\Acceptance\LoginPageCest:userNotFound
Test: tests/Acceptance/LoginPageCest.php:userNotFound
Scenario --
 I am on page "/login"
 I fill field "[test=username-input]","aa"
 I fill field "[test=password-input]","helloworld"
 I click "[test=login-button]"
 I see "User not found","span"
 I grab text from "[test=message-outcome]"
 The message outcome is: User not found
 PASSED 

LoginPageCest: Password incorrect
Signature: Tests\Acceptance\LoginPageCest:passwordIncorrect
Test: tests/Acceptance/LoginPageCest.php:passwordIncorrect
Scenario --
 I am on page "/login"
 I fill field "[test=username-input]","hes"
 I fill field "[test=password-input]","aa"
 I click "[test=login-button]"
 I see "Password does not match","span"
 I grab text from "[test=message-outcome]"
 The message outcome is: Password does not match
 PASSED 

LoginPageCest: Login success
Signature: Tests\Acceptance\LoginPageCest:loginSuccess
Test: tests/Acceptance/LoginPageCest.php:loginSuccess
Scenario --
 I am on page "/login"
 I fill field "[test=username-input]","hes"
 I fill field "[test=password-input]","helloworld"
 I click "[test=login-button]"
 I see "Log in successful","span"
 I grab text from "[test=message-outcome]"
 The message outcome is: Log in successful
 PASSED 

-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Time: 00:00.206, Memory: 12.00 MB

OK (5 tests, 11 assertions)
root@hes:/var/www/e2/p3# php console App seedAll
^ "Executing App\Commands\AppCommand@seedAll"
^ "Migration successful."
^ "Seed rarities successful."
^ "Seed item categories successful."
^ "Seed items successful."
^ "Seed pets successful."
^ "Seed user successful."
root@hes:/var/www/e2/p3# php vendor/bin/codecept run Acceptance --steps
Codeception PHP Testing Framework v5.0.12 https://stand-with-ukraine.pp.ua

Tests.Acceptance Tests (5) --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
GradingFlowCest: Login
Signature: Tests\Acceptance\GradingFlowCest:login
Test: tests/Acceptance/GradingFlowCest.php:login
Scenario --
 I am on page "/login"
 I fill field "[test=username-input]","hes"
 I fill field "[test=password-input]","helloworld"
 I click "[test=login-button]"
 I see "Log in successful","span"
 I grab text from "[test=message-outcome]"
 The message outcome is: Log in successful
 I am on page "/center"
 I click "[test=adopt-button]"
 I grab text from "[test=message-outcome]"
 The message outcome is: Congratulations on your new pet!
 I am on page "/bank"
 I grab text from "[test=money-amount]"
 The user balance is: 10000 tm
 I am on page "/store?store=store-general"
 I see "Welcome to the general store","p"
 I click "[test=purchase-button]"
 I grab text from "[test=message-outcome]"
 The message outcome is: Purchase successful
 I am on page "/bank"
 I grab text from "[test=money-amount]"
 The user balance is: 9900 tm
 Balance is lower, purchase was successful
 I am on page "/store?store=store-special"
 I see "Welcome to the special store","p"
 I click "[test=purchase-button]"
 I grab text from "[test=message-outcome]"
 The message outcome is: Purchase successful
 I am on page "/bank"
 I grab text from "[test=money-amount]"
 The user balance is: 6900 tm
 Balance is lower, purchase was successful
 I am on page "/home"
 I see "Species","div"
 I see "omlette","div"
 I see "paintbrush","div"
 I click "[test=logout-button]"
 I see "Log in","h3"
 I grab text from "[test=message-outcome]"
 The message outcome is: Log out successful
 PASSED 

LoginPageCest: Page loads
Signature: Tests\Acceptance\LoginPageCest:pageLoads
Test: tests/Acceptance/LoginPageCest.php:pageLoads
Scenario --
 I am on page "/login"
 I see "Log in","h3"
 PASSED 

LoginPageCest: User not found
Signature: Tests\Acceptance\LoginPageCest:userNotFound
Test: tests/Acceptance/LoginPageCest.php:userNotFound
Scenario --
 I am on page "/login"
 I fill field "[test=username-input]","aa"
 I fill field "[test=password-input]","helloworld"
 I click "[test=login-button]"
 I see "User not found","span"
 I grab text from "[test=message-outcome]"
 The message outcome is: User not found
 PASSED 

LoginPageCest: Password incorrect
Signature: Tests\Acceptance\LoginPageCest:passwordIncorrect
Test: tests/Acceptance/LoginPageCest.php:passwordIncorrect
Scenario --
 I am on page "/login"
 I fill field "[test=username-input]","hes"
 I fill field "[test=password-input]","aa"
 I click "[test=login-button]"
 I see "Password does not match","span"
 I grab text from "[test=message-outcome]"
 The message outcome is: Password does not match
 PASSED 

LoginPageCest: Login success
Signature: Tests\Acceptance\LoginPageCest:loginSuccess
Test: tests/Acceptance/LoginPageCest.php:loginSuccess
Scenario --
 I am on page "/login"
 I fill field "[test=username-input]","hes"
 I fill field "[test=password-input]","helloworld"
 I click "[test=login-button]"
 I see "Log in successful","span"
 I grab text from "[test=message-outcome]"
 The message outcome is: Log in successful
 PASSED 

-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Time: 00:00.370, Memory: 12.00 MB

OK (5 tests, 11 assertions)
```