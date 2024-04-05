<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Wachtwoord generator</title>
<style>
    .container {
        margin: 50px auto;
        width: 50%;
    }
    input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Wachtwoordgenerator</h2>
    <img src="wumpusvarken.png" width="20%"/>
    <form action="password.php" method="post">
        <label for="length">Wachtwoord lengte:</label>
        <input type="number" id="length" name="length" min="1" max="100" value="">
        <br>
        <input type="checkbox" id="use_uppercase" name="use_uppercase">
        <label for="use_uppercase">Hoofdletters</label>
        <br>
        <input type="checkbox" id="use_special_chars" name="use_special_chars">
        <label for="use_special_chars">Speciale tekens</label>
        <br>
        <input type="submit" value="Generate wachtwoord">
    </form>
</div>

</body>
</html>
