<?php

# Set up the variables to define a deck of cards
$suits = ['♠', '♥', '♣', '♦']; 
$cards_per_suit = 13;

# Create an empty array to hold the cards
$cards = [];

# Populate the deck of cards using nested for loops and an associative array
# Non-numeric cards are assigned integeres are as follows: Ace 1; Jack 11; Queen 12; King 13
foreach ($suits as $suit) {
    for ($i = 1; $i <= $cards_per_suit; $i++) {
        $cards[] = [
            'suit' => $suit,
            'value' => $i,
            'rank' => '' # We will use conditional logic later to add the rank based on the card value
        ];
    }
};

# Add the rank using a for loop with conditional logic
foreach ($cards as &$card) {
    if ($card['value'] == 13) {
        $card['rank'] = 'K';
    } elseif ($card['value'] == 12) {
        $card['rank'] = 'Q';
    } elseif ($card['value'] == 11) {
        $card['rank'] = 'J';
    } elseif ($card['value'] == 1) {
        $card['rank'] = 'A';
    } else {
        $card['rank'] = $card['value'];
    }
}

# Shuffle the cards
shuffle($cards);

# Split the cards in two
$player1_cards = array_splice($cards, 0, count($cards) / 2);
$player2_cards = $cards; # Remainder of the cards fo to player 2

# Set up an array to hold the rounds
$rounds = [];

# Run the game until one of the players has zero cards
while (count($player1_cards) > 0 && count($player2_cards) > 0) {
    
    # Remove a card from each player's deck
    $player1_card = array_pop($player1_cards);
    $player2_card = array_pop($player2_cards);

    # Compare the value on each card
    if ($player1_card['value'] > $player2_card['value']) {
        # Player 1 wins
        # Award the cards to player 1
        array_push($player1_cards, $player1_card, $player2_card);
        
        # Add the round
        $rounds[] = [
            'player1_card' => $player1_card,
            'player2_card' => $player2_card,
            'player1_cards' => count($player1_cards),
            'player2_cards' => count($player2_cards),
            'outcome' => 'Player 1'
        ];

    } elseif ($player1_card['value'] < $player2_card['value']) {
        # Player 2 wins
        # Award the cards to player 2
        array_push($player2_cards, $player1_card, $player2_card);
        
        # Add the round
        $rounds[] = [
            'player1_card' => $player1_card,
            'player2_card' => $player2_card,
            'player1_cards' => count($player1_cards),
            'player2_cards' => count($player2_cards),
            'outcome' => 'Player 2'
        ]; 

    
    } else {
        # Draw
        # Do not award the cards to either player (they are discarded)

        # Add the round
        $rounds[] = [
            'player1_card' => $player1_card,
            'player2_card' => $player2_card,
            'player1_cards' => count($player1_cards),
            'player2_cards' => count($player2_cards),
            'outcome' => 'Draw'
        ];

        }
    }

# Set up a variable to store the winner
$winner = "None";

# Compute the winner of the game
if (count($player1_cards) == 0) {
    $winner = "Player 2"; 
} elseif (count($player2_cards) == 0) {
    $winner = "Player 1"; 
} else {
    $winner = "Draw";
    }



require 'index-view.php';