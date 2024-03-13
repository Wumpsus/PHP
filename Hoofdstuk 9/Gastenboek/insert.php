<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berichten</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Bericht toevoegen</h1>

<form action="" method="post">
    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" required><br>

    <label for="bericht">Bericht:</label>
    <input type="text" id="bericht" name="bericht" required><br>

    <label for="datum">Datum:</label>
    <input type="date" id="land" name="datum" required><br>

    <input type="submit" value="Toevoegen">
</form>

</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"]  == "POST") {
    echo "Er is gepost<br>";
    print_r($_POST);

    //conect database
include "connect.php";

//maak een query
$sql = "INSERT INTO gasten (ID, naam, bericht, datum) 
VALUES (:ID, :naam, :bericht, :datum);";
//prepare  query
$query = $conn->prepare($sql);
//uitvoeren
$status = $query->execute(
    [
        ':ID'=>$_POST['id'],
        ':naam'=>$_POST['naam'],
        ':bericht'=>$_POST['bericht'],
        ':datum'=>$_POST['datum'],
    ]
);
if($status == true){
    echo "<script>alert(Toevoegen is gelukt!)</script>";
    echo "<script>location.replace(homepage.php); </script>";
    header("location:homepage.php");
} else {
    echo "<script>alert(Toevoegen is niet gelukt.)</script>";
}
}

?>