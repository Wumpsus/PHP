<?php
    // functie: formulier en database insert bier
    // auteur: Wigmans

    echo "<h1>Insert Bier</h1>";

    require_once('functions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertbier($_POST) == true){
            echo "<script>alert('bier is toegevoegd')</script>";
        } else {
            echo '<script>alert("bier is NIET toegevoegd")</script>';
        }
    }
?>
<html>
<style>
    body{
        background-image: url("img/6975030.jpg");
    text-align: center;
    background-repeat: no-repeat;
    color: purple;

    }
</style>
    <body>
        <form method="post">
        <input type="hidden"  id="naam" name="biercode" required value="<?php echo $row['biercode']; ?>"><br>

        <label for="naam">Naam:</label>
    <input type="text"  id="naam" name="naam" required><br>

    <label for="soort">soort:</label>
    <input type="text" id="soort" name="soort" required><br>

    <label for="stijl">stijl:</label>
    <input type="text" id="stijl" name="stijl" required><br>
    
    <label for="alcohol">alcohol:</label>
    <input type="text" id="alcohol" name="alcohol" required><br>
    
    <label for="brouwcode">brouwcode:</label>
    <input type="text" id="brouwcode" name="brouwcode" required><br>
    
    <input type="submit" name="btn_ins" value="insert">
  </form>

       
        
        <br><br>
        <a href='main.php'>Home</a>
    </body>
</html>
