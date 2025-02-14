<?php
    // auteur: Michael Davelaar
    // functie: nieuwe ziekmelding toevoegen

    echo "<h1>Voeg nieuwe ziekmelding toe</h1>";

    require_once('functions.php');
	 
    // Test of er op de voeg toe knop is gedrukt 
    if(isset($_POST) && isset($_POST['voeg'])){

        // Test of insert gelukt is
        if(insertziek($_POST) == true){
            echo "<script>alert('Ziekmelding is toegevoegd!')</script>";
        } else {
            echo '<script>alert("womp womp ziekmelding is niet toegevoegd! (fout)")</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <!-- Toevoeging van de ziekmelding met de correcte informatie -->
        <form method="post">
        <input type="hidden"  id="id" name="id" required value="<?php echo $row['id']; ?>"><br>

        <label for="docent">Docent:</label>
    <input type="text"  id="docent" name="docent" required><br>

    <label for="reden">Reden:</label>
    <input type="text" id="reden" name="reden" required><br>

    <label for="datum">Datum:</label>
<input type="text" id="datum" name="datum" required><br>

    <input type="submit" name="voeg" value="Voeg toe">
  </form>

       
        
        <br><br>
        <!-- Stuurt je weer terug naar de main page -->
        <a href='mainn.php'>Home</a>
    </body>
</html>