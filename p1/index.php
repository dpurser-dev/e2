<?php

# Define an object called a card, which consists of a value and a suit


# Create a deck of cards
$deck = array();

for ($i = 1; $i <= 13; $i++) {
    for($j = 1; $j <= 4; $j++) {
        $deck[] = [$i, $j];
    }
}

# Shuffle the deck


# Split the deck in two


# Define an object called a round


# Create rounds until the deck is complete


# Compute the winner from the rounds


require 'index-view.php';