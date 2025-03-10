<?php
session_start();

$username = "";
$username_err = $password_err = "";

// Als gebruiker is ingelogd, stuurt het hem naar de hoofdpagina
if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Controleer of gebruiker heeft ingevuld
if($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "config.php";

    // Invoer van formulier
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE username = :username";

    if($stmt = $pdo->prepare($sql)){
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

        $param_username = trim($_POST["username"]);

        if($stmt->execute()){
            // Als gebruiker bestaat, controleer het wachtwoord
            if($stmt->rowCount() == 1){
                if($row = $stmt->fetch()){
                    $id = $row["id"];
                    $username = $row["username"];
                    $hashed_password = $row["password"];
                    if(password_verify($password, $hashed_password)){
                        // Als wachtwoord correct is, start het de sessie
                        session_start();

                        // Sla gegevens op in sessievariabelen
                        $_SESSION["user_id"] = $id;
                        $_SESSION["username"] = $username;

                        // Stuur gebruiker door naar de hoofdpagina
                        header("location: index.php");
                    } else{
                        // Womp womp onjuist wachtwoord
                        $password_err = "womp womp ongeldig wachtwoord";
                    }
                }
            } else{
                // Womp womp gebruiker bestaat niet
                $username_err = "womp womp geen gebruiker met die naam.";
            }
        } else{
            echo "Foutmelding probeer later nog een keer";
        }

        unset($stmt);
    }

    unset($pdo);
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Inloggen</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="username">Gebruikersnaam:</label>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>">
            <span><?php echo isset($username_err) ? $username_err : ""; ?></span>
        </div>
        <div>
            <label for="password">Wachtwoord:</label>
            <input type="password" name="password" id="password">
            <span><?php echo isset($password_err) ? $password_err : ""; ?></span>
        </div>
        <div>
            <input type="submit" value="Inloggen">
        </div>
        <p>Nog geen account? <a href="register.php">Registreer hier</a>.</p>
    </form>
</body>
</html>
