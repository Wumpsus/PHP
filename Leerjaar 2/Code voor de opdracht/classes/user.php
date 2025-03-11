<?php
    // Functie: classdefinitie User 
    // Auteur: Wigmans

    class User{

        // Eigenschappen 
        public $username;
        public $email;
        private $password;
        
        function SetPassword($password){
            $this->password = $password;
        }
        function GetPassword(){
            return $this->password;
        }

        public function ShowUser() {
            echo "<br>Username: $this->username<br>";
            echo "<br>Password: $this->password<br>";
            echo "<br>Email: $this->email<br>";
        }

        public function LoginUser() {
            // Connect to the database
            $conn = new PDO("mysql:host=localhost;dbname=loginlj2", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Prepare and execute the query to find the user
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $this->username);
            $stmt->execute();
            
            // Check if user exists
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Verify the password
                if (password_verify($this->password, $user['password'])) {
                    // Start session and store user information
                    session_start();
                    $_SESSION['username'] = $this->username;
                    return true; // Login successful
                }
            }
            return false; // Login failed
        }        
        public function RegisterUser() {
            $status = false;
            $errors = [];
        
            if ($this->username != "" && $this->password != "") {
                // Connect to the database
                $conn = new PDO("mysql:host=localhost;dbname=loginlj2", "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                // Check if the username already exists
                $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
                $stmt->bindParam(':username', $this->username);
                $stmt->execute();
        
                if ($stmt->rowCount() > 0) {
                    array_push($errors, "Username bestaat al.");
                } else {
                    // Hash the password and store the new user
                    $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
                    $stmt->bindParam(':username', $this->username);
                    $stmt->bindParam(':password', $hashedPassword);
                    $stmt->execute();
                    $status = true;
                }
            }
            return $errors;
        }

        function ValidateUser(){
            $errors=[];

            if (empty($this->username)){
                array_push($errors, "Invalid username");
            } else if (empty($this->password)){
                array_push($errors, "Invalid password");
            }

            // Test username > 3 tekens en < 50 tekens
            
            return $errors;
        }



        // Check if the user is already logged in
        public function IsLoggedin() {
            // Check if user session has been set
            
            return false;
        }

        public function GetUser($username){
            
		    // Doe SELECT * from user WHERE username = $username
            if (false){
                //Indien gevonden eigenschappen vullen met waarden uit de SELECT
                $this->username = 'Waarde uit de database';
            } else {
                return NULL;
            }   
        }

        public function Logout(){
            session_start();
            // remove all session variables
           

            // destroy the session
            
            header('location: index.php');
        }


    }

    

?>