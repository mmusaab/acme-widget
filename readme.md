# Acme Widget Co Assignment

## Intro

This is PHP a project, which showcase the proof of concept for their new sales system for the company "Acme Widget Co" who the leading provider of made up widgets.

## Steps to install the project

- Clone the Project from the command "git clone https://github.com/mmusaab/users_api.git"

inside the folder in terminal run below commands

- cd /path/to/folder
- composer install
- php -S localhost:8800

> php server is started on this url http://localhost:8800/

For the example in index.php i added this set of product catelog to showcase the functionality,

Products: B01, B01, R01, R01, R01 and thier total is $98.28

also unit tests are added, please run below command incommand line:

- ./vendor/bin/phpunit --bootstrap src/Basket.php tests/BasketTest.php

Use this PHP-CS-Fixer command to fix PSR code standerds issues

- ./vendor/bin/php-cs-fixer fix src
- ./vendor/bin/php-cs-fixer fix tests

Use this PHPStan command to finds bugs in your code

- ./vendor/bin/phpstan analyse src tests

Also logging is included and the log file at path ‘/log/app.log’
