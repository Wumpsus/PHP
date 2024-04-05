<?php
// auteur: Michael Davelaar
// functie: Browser, user en besturyingssysteem info
function getBrowserInfo($userAgent) {
    // Array van bekende browsers (chrome best)
    $browsers = array(
        'Chrome' => 'Google Chrome',
        'Firefox' => 'Mozilla Firefox',
        'Safari' => 'Apple Safari',
        'Opera' => 'Opera',
        'Edge' => 'Microsoft Edge',
        'MSIE' => 'Internet Explorer'
    );

    // Indentificeert browser
    foreach ($browsers as $key => $value) {
        if (strpos($userAgent, $key) !== false) {
            return $value;
        }
    }

    return 'Onbekende browser';
}

function getOSInfo($userAgent) {
    // Araay van bekende besturyingssystemen + Namen van de besturingssystemen
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

    // Identificeert besturyingssysteem
    foreach ($oss as $key => $value) {
        if (strpos($userAgent, $key) !== false) {
            return $value;
        }
    }

    return 'wtf gebruik jij nou weer voor besturingssysteem (onbekend)';
}

// HTTP_USER_AGENT uit $_SERVER superglobal halen
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Browser en besturyingssysteem ophalen
$browser = getBrowserInfo($userAgent);
$os = getOSInfo($userAgent);

// Browser en besturyingssysteem weergeven
echo "User Agent: $userAgent\n<br>";
echo "Internet Browser: $browser\n<br>";
echo "Besturingssysteem: $os\n";
