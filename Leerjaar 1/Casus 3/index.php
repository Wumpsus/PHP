<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Statistiekensysteem</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Over Ons</a></li>
            <li><a href="#">Diensten</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    
    <main>
        <section>
            <h1>Cookies Opslaan</h1>
            <form action="storevisit.php" method="post">
                <div class="form-group">
                    <label for="land">Land:</label>
                    <input  type= text id="land" name="land" required>
                     
                </div>
                <div class="form-group">
                    <label for="provider">Provider:</label>
                    <input type="text" id="provider" name="provider" required>
                </div>
                <div class="form-group">
                    <label for="browser">Browser:</label>
                    <input type="text" id="browser" name="browser" required>
                </div>
                <div class="form-group">
                    <label for="referer">Website waarvandaan de bezoeker is gekomen:</label>
                    <input type="text" id="referer" name="referer" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Opslaan">
                </div>
            </form>
        </section>
        <section>
            <h2>Beheer</h2>
            <a href="filtervisit.php">Bekijk data</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Statistiekensysteem. Alle rechten voorbehouden.</p>
        <ul>
            <li><a href="privacy.html">Privacybeleid</a></li>
            <li><a href="terms.html">Algemene Voorwaarden</a></li>
        </ul>
    </footer>
</body>
</html>
