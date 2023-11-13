<?php

require __DIR__.'/vendor/autoload.php';

use RPS\Game;

$game = new Game();

echo 'Rock Paper Scissors';

var_dump($game->play('scissors'));

#App\Debug::dump($game->play('scissors'));