<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bericht toevoegen</title>
    <script src="poll.js"></script>
</head>
<body>
    <h1>Bericht toevoegen</h1>
    <form method="post" action="insert.php">
        <textarea name="message" placeholder="Zet hier je bericht neer"></textarea>
        <input type="submit" name="submit" value="Toevoegen">
    </form>

    <?php
    // Voegt nieuw bericht toe
    if(isset($_POST['submit'])) {
        $message = $_POST['message'];

        $sql = "INSERT INTO messages (message) VALUES ('$message')";
        if ($conn->query($sql) === TRUE) {
            echo "Toegevoegd! je word nu doorgestuurd naar de homepagina.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>
</html>
