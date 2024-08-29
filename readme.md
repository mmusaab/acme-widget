
# Acme Widget Co Assignment



## Intro


This is a PHP project showcasing the proof of concept for their new sales system for the company "Acme Widget Co" which is the leading provider of made-up widgets.



## Assumptions



1. I assumed that when the user adds more than 2 products in the cart, and we have to apply the offer **buy one red widget, get the second half price**, we will apply that on only 2nd red product added not others.
2. Secondly I assumed that when there are no items in the cart, we'll not add delivery charges to the total price.



## Steps to install the project



- Clone the Project from the command "git clone https://github.com/mmusaab/acme-widget.git"

inside the folder in the terminal run below commands


- cd acme-widget

- composer install

- php -S localhost:8800



> php server is started on this url http://localhost:8800/


## index.php
Index.php is the main for for browser testing, i followed the examples given in the pdf to showcase the functionality.

    Products: ["B01","G01"]  
    Basket Total: 37.85  
      
    Products: ["R01","R01"]  
    Basket Total: 54.38  
      
    Products: ["R01","G01"]  
    Basket Total: 60.85  
      
    Products: ["B01","B01","R01","R01","R01"]  
    Basket Total: 98.28


## Unit Tests
also unit tests are added, please run below command incommand line:



Command:  `./vendor/bin/phpunit --bootstrap src/Basket.php tests/BasketTest.php`


## PHP-CS-Fixer
Use this PHP-CS-Fixer command to fix PSR code standards issues



Command: `./vendor/bin/php-cs-fixer fix src`

Command: `./vendor/bin/php-cs-fixer fix tests`

## PHPStan

Use this PHPStan command to finds bugs in your code



Command: `./vendor/bin/phpstan analyse src tests`


## Monolog
Logging is included and the log file at path ‘/log/app.log’