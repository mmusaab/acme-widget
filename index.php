<?php

require_once __DIR__.'/src/Basket.php';
require_once './vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Example usage:
$catalogue = [
    'R01' => 32.95,
    'G01' => 24.95,
    'B01' => 7.95,
];

$deliveryCharges = [
    50 => 4.95,
    90 => 2.95,
    PHP_INT_MAX => 0.00,
];

$offers = [
    'R01' => 'buy_one_get_second_half_price',
];

$logger = new Logger("basket-app");
$stream_handler = new StreamHandler('log/app.log', Logger::DEBUG);
$logger->pushHandler($stream_handler);

$basket = new Basket($catalogue, $deliveryCharges, $offers);
//B01, B01, R01, R01, R01
$basket->add('B01');
$basket->add('B01');
$basket->add('R01');
$basket->add('R01');
$basket->add('R01');

echo "Products: ". json_encode($basket->getProducts());
echo "<br>";
echo "Basket Total: ". $basket->total(); 
$logger->info(json_encode($basket->getProducts())." Basket Total: ". $basket->total());