<?php

# Player’s guess
if ($_POST['form_type'] == "1") {
    
    echo "First form submitted";
    $game_state = 2;
    $selected_side = $_POST["coin_side"];

} elseif ($_POST['form_type'] == "2") {
    
    echo "Second form submitted";

}