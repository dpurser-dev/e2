<?php

echo "Hello from week4.php";

$moves = []; # Create an empty array

$moves = ['rock', 'paper', 'scissors']; # Array of strings

$strawLengths = [2, 2, 2, 1];

$mixed = ['rock', 1, .04, true];

# Array index starts at 0

echo $moves[0];

# echo $moves[3]; Outside of bounds of the array

# Handy built-in function for dumping a variable to the page
var_dump($moves);

$randomNumber = rand(0, 2);

var_dump($randomNumber);

$move = $moves[$randomNumber];

var_dump($move);

# Associative arrays

$penny_value = .01;
$nickel_value = .05;
$dime_value = .10;
$quarter_value = .25;

$coin_values = [
    'penny' => 0.01, 
    'nickel' => 0.05,
    'dime' => 0.10,
    'quarter' => 0.25
];

# Now, we no longer need to remember the index position
var_dump($coin_values['quarter']);

$coin_counts = [
    'penny' => 100,
    'nickel' => 25,
    'dime' => 100,
    'quarter' => 34
];

# Sort alphabetically (according to value, so the ascending number)
asort($coin_counts);

# Reverse sort, add an 'r'
# arsort($coin_counts);

var_dump($coin_counts);

$cards = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

shuffle($cards);

var_dump($cards);

$total = 0;

# Re-writing this section is called 're-factoring'
foreach($coin_counts as $coin => $count) {
    $total = $total + ($count * $coin_values[$coin]);
}

var_dump($total);

# DRY: Do Not Repeat Yourself

# Create a multi-dimensional associative array

$coins = [
    'penny' => [100, 0.01],
    'nickel' => [25, .05],
    'dime' => [100, 0.1],
    'quarter' => [34, 0.25]
];

$total = 0;

foreach ($coins as $coin => $info) {
    $total = $total + ($info[0] * $info[1]);
};

var_dump($total);

# Even better to name them

$coins = [
    'penny' => ['count' => 100, 'value' => .01],
    'nickel' => ['count' => 25, 'value' => .05],
    'dime' => ['count' => 100, 'value' => 0.1],
    'quarter' => ['count' => 34, 'value' => 0.25]
];

$total = 0;

foreach ($coins as $coin => $info) {
    $total = $total + ($info['count'] * $info['value']);
};

var_dump($total);

$cards = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
shuffle($cards);

# Splice also alters the original array, leaving the remainder
$playerCards = array_splice($cards, 0, count($cards) / 2);
$computerCards = $cards;

var_dump($playerCards);

$playerDraw = $playerCards[4]; # This is the last card in the deck, but is hardcoded
$playerDraw = $playerCards[count($playerCards) - 1]; 

# This removes the value from the array and assigns it to draw
$playerDraw = array_pop($playerCards);

var_dump($playerDraw);
var_dump($playerCards);