<?php
include 'config.php';

// Check if required POST variables are set
$land = isset($_POST['land']) ? $_POST['land'] : null;
$provider = isset($_POST['provider']) ? $_POST['provider'] : null;
$browser = isset($_POST['browser']) ? $_POST['browser'] : null;
$referer = isset($_POST['referer']) ? $_POST['referer'] : null;

$ip_adres = $_SERVER['REMOTE_ADDR'];
$datum_tijd = date('Y-m-d H:i:s');

// Proceed only if all required POST variables are set
if ($land && $provider && $browser && $referer) {
    // Prepare the SQL statement
    $sql = "INSERT INTO bezoekers (land, ip_adres, provider, browser, datum_tijd, referer) 
            VALUES ('$land', '$ip_adres', '$provider', '$browser', '$datum_tijd', '$referer')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Nieuw record succesvol toegevoegd";
    } else {
        echo "Fout: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Fout: Niet alle vereiste gegevens zijn ingevuld.";
}
?>

<a href="index.php">Ga terug naar de homepage</a>
