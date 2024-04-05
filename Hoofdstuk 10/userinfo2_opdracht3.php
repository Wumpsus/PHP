<?php
// Databaseverbinding maken
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "browser_tracking";

$conn = new mysqli($servername, $username, $password, $dbname);

// Controleren op fouten bij het maken van de verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Functie om browser info op te halen en de database bij te werken
function updateBrowserVisitCount($userAgent, $conn) {
    global $browsers;

    // Array van bekende browsers (chrome best)
    $browsers = array(
        'Chrome' => 'Google Chrome',
        'Firefox' => 'Mozilla Firefox',
        'Safari' => 'Apple Safari',
        'Opera' => 'Opera',
        'Edge' => 'Microsoft Edge',
        'MSIE' => 'Internet Explorer'
    );

    // Identificeert browser
    foreach ($browsers as $key => $value) {
        if (strpos($userAgent, $key) !== false) {
            $browserName = $value;

            // Controleren of de browser al in de database staat
            $sql = "SELECT * FROM browser_visits WHERE browser_name = '$browserName'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Browser bestaat al in de database, update de bezoekteller
                $sql = "UPDATE browser_visits SET visit_count = visit_count + 1 WHERE browser_name = '$browserName'";
                $conn->query($sql);
            } else {
                // Browser bestaat nog niet in de database, voeg een nieuw record toe
                $sql = "INSERT INTO browser_visits (browser_name, visit_count) VALUES ('$browserName', 1)";
                $conn->query($sql);
            }
            
            return $value;
        }
    }

    return 'Onbekende browser';
}

// Functie om besturingssysteem info op te halen
function getOSInfo($userAgent) {
    // Araay van bekende besturingssystemen + Namen van de besturingssystemen
    $oss = array(
        'Windows NT 10.0' => 'Windows 10',
        'Windows NT 6.3' => 'Windows 8.1',
        'Windows NT 6.2' => 'Windows 8',
        'Windows NT 6.1' => 'Windows 7',
        'Windows NT 6.0' => 'Windows Vista',
        'Windows NT 5.1' => 'Windows XP',
        'Macintosh' => 'Mac OS X',
        'Linux' => 'Linux'
    );

    // Identificeert besturingssysteem
    foreach ($oss as $key => $value) {
        if (strpos($userAgent, $key) !== false) {
            return $value;
        }
    }

    return 'wtf gebruik jij nou weer voor besturingssysteem (onbekend)';
}

// HTTP_USER_AGENT uit $_SERVER superglobal halen
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Browser en besturingssysteem ophalen
$browser = updateBrowserVisitCount($userAgent, $conn);
$os = getOSInfo($userAgent);

// Browser en besturingssysteem weergeven
echo "User Agent:<br> <p>$userAgent\n</p><br>";
echo "Internet Browser:<br> <p>$browser\n</p><br>";
echo "Besturingssysteem:<br> <p>$os\n</p>";

// Tabel van browsers en hun bezoekers weergeven
echo "<br><br><h2>Tabel van browsers en aantal bezoeken:</h2>";
echo "<table border='1'>";
echo "<tr><th>Browser</th><th>Aantal Bezoeken</th></tr>";

$sql = "SELECT browser_name, SUM(visit_count) AS total_visits FROM browser_visits GROUP BY browser_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["browser_name"] . "</td><td>" . $row["total_visits"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>Geen gegevens beschikbaar</td></tr>";
}

echo "</table>";

// Databaseverbinding sluiten
$conn->close();
?>
