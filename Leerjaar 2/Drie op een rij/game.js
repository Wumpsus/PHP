const svgBoard = document.getElementById("game-board");

const shapes = [
    new Rectangle("cyan", 10, 10, 50, 50),
    new Rectangle("blue", 70, 10, 50, 50),
    new Rectangle("green", 130, 10, 50, 50),
    new Circle("cyan", 35, 90, 25),
    new Circle("blue", 95, 90, 25),
    new Circle("green", 155, 90, 25),
    new Rectangle("cyan", 10, 150, 50, 30),
    new Rectangle("blue", 70, 150, 50, 30),
    new Rectangle("green", 130, 150, 50, 30),
    new Triangle("cyan", "20,220 50,180 80,220"),
    new Triangle("blue", "90,220 120,180 150,220"),
    new Triangle("green", "160,220 190,180 220,220")
];

shapes.forEach(shape => shape.draw(svgBoard));
