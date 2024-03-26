<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bericht verwijderen</title>
    <link rel="stylesheet" href="stylee.css">
    <script src="poll.js"></script>
</head>
<body>
    <h1>Bericht verwijderen</h1>
    <?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    ?>
        <p>Wil je dit bericht echt verwijderen?</p>
        <a href="delete.php?id=<?php echo $id; ?>&delete_message=true">Ja</a>
        <a href="homepage.php">Nee</a>
    <?php
    }

    // Verwijdert het bericht
    if(isset($_GET['delete_message'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM messages WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Verwijderd! Je word nu terug gestuurd naar de homepagina.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>
</html>
