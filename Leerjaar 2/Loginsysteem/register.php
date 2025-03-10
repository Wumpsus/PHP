<?php
require_once "config.php";

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Invoer
    if(empty(trim($_POST["username"]))){
        $username_err = "Vul gebruikersnaam in";
    } else{
        // Controleert of naam al bestaat
        $sql = "SELECT id FROM users WHERE username = :username";

        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);

            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Jammer man deze gebruikersnaam bestaat al";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Foutmelding! probeer later opnieuw";
            }

            unset($stmt);
        }
    }
    
    // Controleert wachtwoord
    if(empty(trim($_POST["password"]))){
        $password_err = "Vul wachtwoord in";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Wachtwoord moet 6 tekens hebben";
    } else{
        $password = trim($_POST["password"]);
    }

    // Voegt gebruiker toe aan database
    if(empty($username_err) && empty($password_err)){
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 

            if($stmt->execute()){
                header("location: login.php");
            } else{
                echo "Foutmelding! probeer later opnieuw";
            }

            unset($stmt);
        }
    }

    unset($pdo);
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Registreren</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="username">Gebruikersnaam:</label>
            <input type="text" name="username" id="username" value="<?php echo $username; ?>">
            <span><?php echo $username_err; ?></span>
        </div>    
        <div>
            <label for="password">Wachtwoord:</label>
            <input type="password" name="password" id="password">
            <span><?php echo $password_err; ?></span>
        </div>
        <div>
            <input type="submit" value="Registreren">
        </div>
        <p>Heb je al een account? <a href="login.php">Log hier in</a>.</p>
    </form>
</body>
</html>
