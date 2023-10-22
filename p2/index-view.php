<h2>Mechanics</h2>


<!DOCTYPE html>
<html>

<head>
    <title>Coin Flip</title>
</head>

<body>

    <h1>Coin Flip</h1>
    <form action="process.php" method="post">
        <label for="coin_side">Select your choice:</label>
        <select name="coin_side" id="coin_side">
            <option value="heads">Heads</option>
            <option value="tails">Tails</option>
        </select>
        <br>

        <!-- Hidden input field with an additional value -->
        <input type="hidden" name="form_type" value="1">

        <input type="submit" name="submit_coin" value="Flip the coin">
    </form>
</body>

</html>