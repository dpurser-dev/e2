<?php

require __DIR__.'/vendor/autoload.php';

use RPS\Game;
use App\MyGame;

$game = new Game();

echo 'Rock Paper Scissors';

var_dump($game->play('scissors'));

#App\Debug::dump($game->play('scissors'));

$my_game = new MyGame('heads');

var_dump($my_game->play('heads'));