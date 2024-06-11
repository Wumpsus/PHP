<?php
// Inclusief functies en configuratie
include 'functions.php';

$error = '';
$resultaat = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $invoer = $_POST['som'];
    $nauwkeurigheid = $_POST['nauwkeurigheid'];

    try {
        // Controleer of nauwkeurigheid een geldig getal is
        if (!is_numeric($nauwkeurigheid) || $nauwkeurigheid < 0) {
            throw new Exception("Nauwkeurigheid moet een niet-negatief getal zijn.");
        }

        // Voer de berekening uit
        $antwoord = berekenReeks($invoer, $nauwkeurigheid);

        // Sla de berekening op in de database
        slaBerekeningOp($conn, $invoer, $nauwkeurigheid, $antwoord);

        // Toon het resultaat
        $resultaat = "De uitkomst van de berekening '$invoer' is: $antwoord";
    } catch (Exception $e) {
        $error = 'Fout: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Uitgebreide Rekenmachine</title>
    <style>
        .calculator {
            width: 400px;
            margin: 0 auto;
        }
        .display {
            width: 100%;
            height: 50px;
            text-align: right;
            margin-bottom: 10px;
            font-size: 24px;
            padding-right: 10px;
            box-sizing: border-box;
        }
        .buttons {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }
        .buttons button {
            width: calc(20% - 4px);
            height: 50px;
            font-size: 18px;
            margin: 2px;
            box-sizing: border-box;
        }
    </style>
    <script>
        function appendValue(value) {
            if (value === 'sqrt') {
                document.getElementById('som').value += 'sqrt(';
            } else if (value === '%') {
                document.getElementById('som').value += '%';
            } else {
                document.getElementById('som').value += value;
            }
        }

        function clearDisplay() {
            document.getElementById('som').value = '';
        }

        function calculate() {
            document.getElementById('calcForm').submit();
        }
</script>


</head>
<body>
    <h1>Uitgebreide Rekenmachine</h1>

    <div class="calculator">
        <form id="calcForm" method="post" action="">
            <input type="text" id="som" name="som" class="display" readonly value="<?php echo isset($invoer) ? htmlspecialchars($invoer) : ''; ?>">
            <input type="hidden" id="nauwkeurigheid" name="nauwkeurigheid" value="2">
        </form>
        
        <div class="buttons">
            <button onclick="appendValue('1')">1</button>
            <button onclick="appendValue('2')">2</button>
            <button onclick="appendValue('3')">3</button>
            <button onclick="appendValue('4')">4</button>
            <button onclick="appendValue('+')">+</button>

            <button onclick="appendValue('5')">5</button>
            <button onclick="appendValue('6')">6</button>
            <button onclick="appendValue('7')">7</button>
            <button onclick="appendValue('8')">8</button>
            <button onclick="appendValue('-')">-</button>

            <button onclick="appendValue('9')">9</button>
            <button onclick="appendValue('0')">0</button>
            <button onclick="appendValue('*')">*</button>
            <button onclick="appendValue('(')">(</button>
            <button onclick="appendValue(')')">)</button>

            <button onclick="appendValue('/')">/</button>

            <button onclick="clearDisplay()">C</button>
            <button onclick="appendValue('.')">.</button>
            <button onclick="appendValue(' round(')">Round</button>

            <button onclick="appendValue(' ** ')">^</button>
            <button onclick="appendValue('%')">%</button>
            <button onclick="appendValue('sqrt')">√</button>
            <button onclick="calculate()">=</button>
        </div>
    </div>

    <?php
    if (!empty($error)) {
        echo "<p style='color:red;'>$error</p>";
    }

    if (!empty($resultaat)) {
        echo "<p>$resultaat</p>";
    }
    ?>
</body>
</html>

