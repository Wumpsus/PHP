<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bericht bewerken</title>
    <script src="poll.js"></script>
</head>
<body>
    <h1>Bericht bewerken</h1>
    <?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT id, message FROM messages WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $message = $row['message'];
    ?>
            <form method="post" action="edit.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <textarea name="new_message"><?php echo $message; ?></textarea>
                <input type="submit" name="edit_message" value="Opslaan">
            </form>
    <?php
        } else {
            echo "Bericht niet gevonden.";
        }
    }

    // Bewerkt het bericht
    if(isset($_POST['edit_message'])) {
        $id = $_POST['id'];
        $new_message = $_POST['new_message'];

        $sql = "UPDATE messages SET message='$new_message' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Bewerkt! je word nu doorgestuurd naar de homepagina.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>
</html>
