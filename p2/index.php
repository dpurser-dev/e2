<?php

require 'Turn.php';
session_start();

if (!isset($_SESSION['game_state'])) {
    $_SESSION['game_state'] = 0;
}

$coinSide = (rand(0, 1) == 0) ? "heads" : "tails";




# Load the view
require 'index-view.php';