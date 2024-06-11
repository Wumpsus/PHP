CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    views INT DEFAULT 0
);

-- Voeg enkele nieuwsberichten toe
INSERT INTO news (title, category, content)
VALUES ('Pandabeer gevallen in dierenpark blijdorp', 'Dierentuin', 'Pandabeer dacht hij was spiderman maar flikkerde naar beneden.'),
       ('Rusland wilt nederland bombarderen?!', 'Politiek', 'Er gaan verhalen rond dat rusland nederland wilt bombarderen.. Zijn deze verhalen waar? lees dat maar lekker ergens anders!'),
       ('Man uit detroit denkt hij was iron man', 'Buitenland', 'Een man (19) uit detroit dacht dat hij iron man was en dacht dat hij een kogel kon weerstaan! bleek van niet..');
