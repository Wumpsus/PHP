<?php

use PHPUnit\Framework\TestCase;

// name Login is gekoppeld aan de directory '/src' via composer.json
// Alle submappen worden geautoload.
	/*
			"autoload": {
				  "psr-4": {
						"Login\\": "src/"
				  }
	*/

use Login\classes\User;


// Filename moet gelijk zijn aan de classname LoginTest
class LoginTest extends TestCase{
    
	 // Methods moeten starten met de naam test....
    public function testPassword(){
      $user = new User;
		
      // Object vullen
		$user->SetPassword("Wigmans");	
      $this->assertEquals("Wigmans", $user->GetPassword());
	}
	
	public function testValidateUser(){
		$user = new User;
		//$user->username="";
		$errors = $user->ValidateUser();
		$this->assertEquals("Gebruikersnaam is verplicht.", $errors[0] );
	}

	


	
	public function testRegisterUserSucces() {
		$user = new User;
		$user->username = "testuser";
		$user->SetPassword("testpassword");
	
		$result = $user->RegisterUser();
		$this->assertIsArray($result);
		$this->assertCount(0, $result); // Geen fouten verwacht
	
		// testuser verwijderen na de test
		$reflection = new \ReflectionClass($user);
		$method = $reflection->getMethod('connectDB');
		$method->setAccessible(true);
		$conn = $method->invoke($user);
	
		$stmt = $conn->prepare("DELETE FROM users WHERE username = :username");
		$stmt->bindParam(':username', $user->username);
		$stmt->execute();
	}
	
}
	
?>