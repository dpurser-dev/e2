<?php

# Define an object called a card, which consists of a value and a suit


# Create a deck of cards 
# Create an array to hold the cards
$deck = array();

# Populate the deck array
# Each element is a card, which itself is an array of two elements (value and suit)
# Non-numeric cards are assigned integeres are as follows: Ace 1; Jack 11; Queen 12; King 13
# Suits are assigned integers as follows: Hearts 1; Diamonds 2; Clubs 3; Spades 4  
for ($i = 1; $i <= 13; $i++) {
    for($j = 1; $j <= 4; $j++) {
        $deck[] = [$i, $j];
    }
}

# Shuffle the deck
shuffle($deck);

# Split the deck in two
$player1_cards = array_slice($deck, 0, 26);
$player2_cards = array_slice($deck, 26, 52);

$player1_length = count($player1_cards);
$player2_length = count($player2_cards);

$player1_count = 26;
$player2_count = 26;

# Define an array to hold the rounds
$rounds = 0;
$round_cards = array();
$round_outcome = array();
$round_cardcounts = array();

# Continue loop as long as at least one player still has cards
while (count($player1_cards) > 0 && count($player2_cards) > 0) {
    # Increment the rounds variable by 1
    $rounds ++;
    # Compare the top card from each deck
    if ($player1_cards[0][0] > $player2_cards[0][0]) {
        # Store the cards that were played
        $round_cards[] = [$player1_cards[0][0], $player2_cards[0][0]];
        # Store the outcme
        $round_outcome[] = "Player 1";
        # Append both cards to the bottom of Player 1's deck
        $player1_cards[] = $player1_cards[0];
        $player1_cards[] = $player2_cards[0];
        # Remove the top card from both decks
        unset($player1_cards[0]);
        unset($player2_cards[0]);
        # Reindex the arrays
        $player1_cards = array_values($player1_cards);
        $player2_cards = array_values($player2_cards);
        # Store the card counts
        $round_cardcounts[] = [count($player1_cards), count($player2_cards)];

    } elseif ($player1_cards[0][0] < $player2_cards[0][0]) {
        # Store the cards that were played
        $round_cards[] = [$player1_cards[0][0], $player2_cards[0][0]];
        # Store the outcme
        $round_outcome[] = "Player 2";
        # Append both cards to the bottom of Player 1's deck
        $player2_cards[] = $player2_cards[0];
        $player2_cards[] = $player1_cards[0];
        # Remove the top card from both decks
        unset($player1_cards[0]);
        unset($player2_cards[0]);
        # Reindex the arrays
        $player1_cards = array_values($player1_cards);
        $player2_cards = array_values($player2_cards);
        # Store the card counts
        $round_cardcounts[] = [count($player1_cards), count($player2_cards)];
        
    } else {
        # Store the cards that were played
        $round_cards[] = [$player1_cards[0][0], $player2_cards[0][0]];
        # Store the outcme
        $round_outcome[] = "Draw";
        # Remove the top card from both decks
        unset($player1_cards[0]);
        unset($player2_cards[0]);
        # Reindex the arrays
        $player1_cards = array_values($player1_cards);
        $player2_cards = array_values($player2_cards);
        # Store the card counts
        $round_cardcounts[] = [count($player1_cards), count($player2_cards)];
        
    }
}

# Compute the winner of the game
if (count($player1_cards) == 0) {
    $winner = "Player 2"; 
} elseif (count($player2_cards) == 0) {
    $winner = "Player 1"; 
} else {
    $winner = "Draw";
    }



require 'index-view.php';