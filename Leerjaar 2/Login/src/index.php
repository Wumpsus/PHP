<?php
    // Functie: programma login OOP 
    // Auteur: Wigmans

    // Initialisatie
	require_once "../vendor/autoload.php";
	use Login\classes\User;
?>

<!DOCTYPE html>

<html lang="en">

<body>

	<h3>PDO Login and Registration</h3>
	<hr/>

	<h3>Welcome op de HOME-pagina!</h3>
	<br />
	<?php

    // require_once 'classes/user.php';

    $user = new User();

	// Activeer de session
	session_start();

	// Indien Logout geklikt
	if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
		$user->Logout();
	}

	// Check login session: staat de user in de session?
	if(!$user->IsLoggedin()){
		// Alert not login
		echo "U bent ingelogd<br><br>";
		// Toon login button
		echo '<a href = "login_form.php">Login</a>';
	} else {
		
		// select userdata from database
		$user->GetUser($user->username);
		
		// Print userdata
		echo "<h2>Het spel kan eindelijk beginnen</h2>";
		echo "Ingelogd met:<br/>";
		$user->ShowUser();
		echo "<br><br>";
		echo '<a href = "?logout=true">Logout</a>';
	}
	
	?>

</body>
</html>