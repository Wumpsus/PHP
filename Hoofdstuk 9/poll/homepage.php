<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berichten</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Berichten</h1>
    <?php
    // Haalt berichten op
    $sql = "SELECT id, message FROM messages ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<p>" . $row["message"] . "</p>";
            echo "<a href='edit.php?id=" . $row["id"] . "'>Bewerken</a> ";
            echo "<a href='delete.php?id=" . $row["id"] . "'>Verwijderen</a>";
            echo "</div>";
        }
    } else {
        echo "Geen berichten gevonden.";
    }
    ?>
</body>
</html>
