<?php
require 'connect.php';

$stmt = $conn->prepare("SELECT id, naam, email, bericht, datum FROM reacties ORDER BY datum DESC");
$stmt->execute();
$reacties = $stmt->fetchAll();

foreach ($reacties as $reactie) {
    echo "<div class='reactie'>";
    echo "<h3>" . htmlspecialchars($reactie['naam']) . " zei op " . $reactie['datum'] . ":</h3>";
    echo "<p>" . $reactie['bericht'] . "</p>";
    echo "<a href='edit.php?id=" . $reactie['id'] . "'>Bewerk</a> | ";
    echo "<a href='delete.php?id=" . $reactie['id'] . "'>Verwijder</a>";
    echo "</div>";
}
?>
