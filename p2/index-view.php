<!DOCTYPE html>
<html>

<head>
    <title>Project 2 - Noughts and Crosses</title>
    <meta charset='utf-8'>
    <link href=data: , rel=icon>
    <link href='styles/style.css' rel='stylesheet' type='text/css'>
</head>

<body>

    <h1>Noughts and Crosses</h1>

    <h2>Instructions</h2>
    <ul>
        <li>There are two players, you and the computer.</li>
        <li>Your marker is an "X", and the computer's marker is an "O".</li>
        <li>The objective is to draw three of the same marker in a row, vetical, horizontal, or diagonal.</li>
        <li>In each round, both players will take a turn drawing their market in an empty space (denoted by the button
            marked "Choose").</li>
        <li>Your turn is first.</li>
        <li>Press the "Start over" button to reset the game.</li>
    </ul>
    <p><b>Note:</b> The game will not alert you when a winner has been determined, this is up to the player</p>

    <form action="clear-session.php" method="post">
        <input type="submit" name="clear-session" value="Start over">
    </form>

    <table>
        <?php for ($row = 0; $row < 3; $row++) { ?>
        <tr>
            <?php for ($col = 0; $col < 3; $col++) { ?>
            <td>
                <?php if ($game_board[$row][$col] == 0) { ?>
                <form action="process.php" method="post">
                    <input type="hidden" name="row" value=<?php echo $row ?> />
                    <input type="hidden" name="col" value=<?php echo $col ?> />
                    <input type="submit" value="Choose" />
                </form>
                <?php } else { echo $game_board[$row][$col]; } ?>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>

</body>

</html>