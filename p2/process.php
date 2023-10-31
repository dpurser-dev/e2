<?php

session_start();

# Get the game board from the session storage
$game_board = $_SESSION['game_board'];

# Take the coordinates from the player's input
$row = $_POST['row'];
$col = $_POST['col'];

# Update the game board
$game_board[$row][$col] = "X";

# Generate the computer's turn, with a limit of 50 attempts
$attempts = 0;
while($attempts < 50) {

    # Generate a random set of coordinates
    $row = rand(0, 2);
    $col = rand(0, 2);

    # Check that this is a valid turn
    if ($game_board[$row][$col] == 0) {
        # If so, update the board and the exit the loop
        $game_board[$row][$col] = "O";
        $attempts = 50;
    }

    $attempts++;
};

# Store the updated game board in the session
$_SESSION['game_board'] = $game_board;

# Load the view
header('Location: index.php');