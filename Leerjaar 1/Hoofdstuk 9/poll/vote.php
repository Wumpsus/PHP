<script src="poll.js"></script>
<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleert of de vereiste dingen er zijn
    if (isset($_POST['option']) && isset($_POST['message_id'])) {
        $option = $_POST['option'];
        $message_id = $_POST['message_id'];

        // Voegt stem toe aan database
        $sql = "INSERT INTO votes (message_id, option_chosen) VALUES ('$message_id', '$option')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Stem opgeslagen! Je word nu doorgestuurd naar de homepagina.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Niet alle vereiste gegevens zijn ontvangen.";
    }
} else {
    echo "Ongeldige aanvraag.";
}
?>
