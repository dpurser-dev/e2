<!DOCTYPE html>
<html lang='eng'>

<head>

    <title>Project 1</title>
    <meta charset='utf-8'>
    <link href=data:, rel=icon>
    <style>
    .card {
        border: 1px solid black;
        display: inline-block;
        padding: 5px;
    }

    th,
    td {
        border-bottom: 1px solid #ddd;
        padding: 10px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    td {
        text-align: center;
    }
    </style>
</head>

<body>

    <h1>War (card game) Simulator</h1>

    <h2>Mechanics</h2>
    <ul>
        <li>Each player starts with half the deck (26 cards), shuffled in a random order.</li>
        <li>For each round, a card is picked from the “top” of each player’s cards.</li>
        <li>Whoevers card is highest wins that round and keeps both cards.</li>
        <li>If the two cards are of the same value, it’s a tie and those cards are discarded.</li>
        <li>The player who ends up with 0 cards is the loser.</li>
    </ul>

    <h2>Results</h2>
    <ul>
        <li><b>Winner: </b><?php echo $winner ?></li>
        <li><b>Rounds: </b><?php echo count($rounds) ?></li>
    </ul>

    <h2>Rounds</h2>
    <table>
        <tbody>
            <tr>
                <th>Round #</th>
                <th>Player 1 card</th>
                <th>Player 2 card</th>
                <th>Winner</th>
                <th>Player 1 cards left</th>
                <th>Player 2 cards left</th>
            </tr>

            <?php
        foreach ($rounds as $index => $round) { ?>

            <tr>
                <td><?php echo ($index + 1) ?> </td>
                <td><span class="card">
                        <?php echo $round['player1_card']['rank'], $round['player1_card']['suit'] ?></span>
                </td>
                <td><span
                        class="card"><?php echo $round['player2_card']['rank'], $round['player2_card']['suit'] ?></span>
                </td>
                <td><?php echo $round['outcome'] ?></td>
                <td><?php echo $round['player1_cards'] ?></td>
                <td><?php echo $round['player2_cards'] ?></td>
            </tr>

            <?php }
    ?>
        </tbody>
    </table>


</body>

</html>