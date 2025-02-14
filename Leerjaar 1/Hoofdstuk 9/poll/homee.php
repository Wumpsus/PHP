<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepagina</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
    <h1>Homepagina</h1>
    <a href="insert.php">Voeg nieuw bericht toe</a>
    <br><br>
    <table>
        <tr>
            <th>Bericht</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
            <th>Poll</th>
        </tr>
        <?php
        // Haalt de berichten op
        $sql = "SELECT id, message FROM messages ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["message"] . "</td>";
                echo "<td><a class='edit-link' href='edit.php?id=" . $row["id"] . "'>Bewerken</a></td>";
                echo "<td><a class='delete-link' href='delete.php?id=" . $row["id"] . "'>Verwijderen</a></td>";
                echo "<td>";
                echo "<div class='poll-option'>";
                echo "<form action='vote.php' method='post'>";
                echo "<input type='hidden' name='option' value='Ja'>";
                echo "<input type='hidden' name='message_id' value='" . $row["id"] . "'>";
                echo "<button type='submit'>Ja</button>";
                echo "</form>";
                echo "</div>";
                echo "<div class='poll-option'>";
                echo "<form action='vote.php' method='post'>";
                echo "<input type='hidden' name='option' value='Nee'>";
                echo "<input type='hidden' name='message_id' value='" . $row["id"] . "'>";
                echo "<button type='submit'>Nee</button>";
                echo "</form>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Geen berichten gevonden.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
