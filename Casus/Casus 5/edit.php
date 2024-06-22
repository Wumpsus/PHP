<?php
require 'connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM reacties WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $reactie = $stmt->fetch();

    if ($reactie) {
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Reactie bewerken</title>
</head>
<body>
    <h2>Bewerk je bericht</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $reactie['id']; ?>">
        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam" value="<?php echo htmlspecialchars($reactie['naam']); ?>" required>
        <br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($reactie['email']); ?>" required>
        <br>
        <label for="bericht">Bericht:</label>
        <textarea id="bericht" name="bericht" required><?php echo htmlspecialchars($reactie['bericht']); ?></textarea>
        <br>
        <input type="submit" value="Update reactie">
    </form>
</body>
</html>
<?php
    } else {
        echo "Reactie gevonden!";
    }
} else {
    echo "waar is je aanvraag????";
}
?>
