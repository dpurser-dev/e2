<?php

session_start();

# Check if a game is in progress
if (!isset($_SESSION['game_board'])) {
    # If not, set up a new game board
    $_SESSION['game_board'] = array(
        array(0,0,0),
        array(0,0,0),
        array(0,0,0)
    );
}

# Store the game board in the session data
$game_board = $_SESSION['game_board'];

# Load the view
require 'index-view.php';