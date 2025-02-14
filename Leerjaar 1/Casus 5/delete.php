<?php
require 'connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM reacties WHERE id = :id");
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        echo "Daar gaat die reactie (verwijderd)";
    } else {
        echo "womp womp een fout";
    }
} else {
    echo "waar is je aanvraag???";
}
?>
