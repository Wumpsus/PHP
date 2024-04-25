<?php
// auteur: Michael Davelaar
// functie: Alle functies van de website

include_once "connectcrud.php";

 function connectDb(){
    $servername = SERVERNAME;
    $username = USERNAME;
    $password = PASSWORD;
    $dbname = DATABASE;
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //echo "Connected successfully";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

 }

 
 // Selecteert de data uit opgegeven table
 function getData($table){
    // Connect database
    $conn = connectDb();

    // Select data uit de opgegeven table methode query
    // query: is een prepare en execute in 1 zonder placeholders
    // $result = $conn->query("SELECT * FROM $table")->fetchAll();

    // Select data uit de opgegeven table methode prepare
    $sql = "SELECT * FROM $table";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();

    return $result;
 }

 // Selecteert de rij van de opgeven klantid uit de table product
 function getziek($id){
    // Connect database
    $conn = connectDb();

    // Select data uit de opgegeven table methode prepare
    $sql = "SELECT * FROM " . CRUD_TABLE . " WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute([':id'=>$id]);
    $result = $query->fetch();

    return $result;
 }


 function ovzziek(){

    // Haal alle product record uit de tabel 
    $result = getData(CRUD_TABLE);
    
    //print table
    printTable($result);
    
 }

 
// Function 'PrintTable' print een HTML-table met data uit $result.
function printTable($result){
    // Zet de hele table in een variable $table en print hem 1 keer 
    $table = "<table>";

    // Print header table

    // Haalt de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th>" . $header . "</th>";   
    }

    // print elke rij van de tabel
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function crudziek() {
    // Menu-item insert
    $txt = "<h1>Crud ziekmelding</h1><nav><a href='insert.php'>Voeg nieuwe ziekmelding toe</a></nav><br>";
    echo $txt;

    // Get data from the database
    $result = getData(CRUD_TABLE);

    // Check if $result is an array and not empty before calling printCrudklant
    if (is_array($result) && !empty($result)) {
        // Print table
        printCrudziek($result);
    } else {
        echo "No data found."; // Handle case where no data is retrieved
    }
}

// Function 'printCrudklant' print een HTML-table met data uit $result 
// En wijzig + verwijder knop
function printCrudziek($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table>";

    // Print header table

    // Haalt de kolommen uit de eerste rij [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th>" . $header . "</th>";   
    }
    // Voegt actie kopregel toe
    $table .= "<th colspan=2>Actie</th>";
    $table .= "</th>";

    // Print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // Print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";  
        }
        
        // Delete knopje
        $table .= "<td>
            <form method='post' action='delete.php?id=$row[id]' >       
                <button>Verwijder</button>	 
            </form></td>";

        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function updateziek($row){
   
    // Maakt database connectie
    $conn = connectDb();

    // Maakt een query 
    $sql = "UPDATE " . CRUD_TABLE .
    " SET 
        docent = :docent, 
        reden = :reden,
        datum = :datum
    WHERE id = :id";

    // Prepare query
    $stmt = $conn->prepare($sql);

    // Uitvoeren
    $stmt->execute([
        ':docent' => $row['docent'],
        ':reden' => $row['reden'],
        ':datum' => $row['datum'],
        ':id' => $row['id']
    ]);

    // Test of de database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal;
}


function insertziek($post){
    // Maakt database connectie
    $conn = connectDb();

    // Maakt een query 
    $sql = "
        INSERT INTO " . CRUD_TABLE . " (docent, reden, datum)
        VALUES (:docent, :reden, :datum) 
    ";

    // Prepare query
    $stmt = $conn->prepare($sql);
    // Uitvoeren
    $stmt->execute([
        ':docent'=>$_POST['docent'],
        ':reden'=>$_POST['reden'],
        ':datum'=>$_POST['datum']
    ]);

    
    // Test of de database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal;  
}

function deleteziek($klantid){

    // Connect database
    $conn = connectDb();
    
    // Maakt een query 
    $sql = "
    DELETE FROM " . CRUD_TABLE . 
    " WHERE id = :id";

    // Prepare query
    $stmt = $conn->prepare($sql);

    // Uitvoeren
    $stmt->execute([
    ':id'=>$_GET['id']
    ]);

    // Test of de database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal;
}

?>