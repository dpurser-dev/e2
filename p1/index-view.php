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
            <tr>
                <td>0 </td>
                <td><span class="card">4 ♦</span>
                </td>
                <td><span class="card">6 ♥ </span></td>
                <td>Player 2 </td>
                <td>25 </td>
                <td>23 </td>
            </tr>
        </tbody>
    </table>

    <p>
        <?php
        foreach ($deck as &$card) {
            echo $card[0];
            echo $card[1];
        }
    ?>
    </p>

    <p><b>Player 1 deck lengh: </b><?php echo $player1_length ?></p>
    <p><b>Player 2 deck lengh: </b><?php echo $player2_length ?></p>
    <h2>Summary</h2>
    <p><b>Winner: </b><?php echo $winner ?>
    <p><b>Rounds: </b><?php echo $rounds ?>

        <?php
        for ($i = 0; $i < $rounds; $i++) { ?>
    <p>
        <b>Round: </b><?php echo $i ?>
        <b>Winner: </b><?php echo $round_outcome[$i] ?>
        <b>Cards played: </b><?php echo $round_cards[$i][0] ?>, <?php echo $round_cards[$i][1] ?>
        <b>Card count: </b><?php echo $round_cardcounts[$i][0] ?>, <?php echo $round_cardcounts[$i][1] ?>
    </p>
    <?php }
    ?>

</body>

</html>