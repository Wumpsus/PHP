class Figure {
    constructor(color) {
        this.color = color;
    }
}

class Circle extends Figure {
    constructor(color, cx, cy, radius) {
        super(color);
        this.cx = cx;
        this.cy = cy;
        this.radius = radius;
    }
    draw(svg) {
        let circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
        circle.setAttribute("cx", this.cx);
        circle.setAttribute("cy", this.cy);
        circle.setAttribute("r", this.radius);
        circle.setAttribute("fill", this.color);
        circle.setAttribute("stroke", "black");
        circle.setAttribute("stroke-width", "3");
        svg.appendChild(circle);
    }
}

class Rectangle extends Figure {
    constructor(color, x, y, width, height) {
        super(color);
        this.x = x;
        this.y = y;
        this.width = width;
        this.height = height;
    }
    draw(svg) {
        let rect = document.createElementNS("http://www.w3.org/2000/svg", "rect");
        rect.setAttribute("x", this.x);
        rect.setAttribute("y", this.y);
        rect.setAttribute("width", this.width);
        rect.setAttribute("height", this.height);
        rect.setAttribute("fill", this.color);
        rect.setAttribute("stroke", "black");
        rect.setAttribute("stroke-width", "3");
        svg.appendChild(rect);
    }
}

class Triangle extends Figure {
    constructor(color, points) {
        super(color);
        this.points = points;
    }
    draw(svg) {
        let triangle = document.createElementNS("http://www.w3.org/2000/svg", "polygon");
        triangle.setAttribute("points", this.points);
        triangle.setAttribute("fill", this.color);
        triangle.setAttribute("stroke", "black");
        triangle.setAttribute("stroke-width", "3");
        svg.appendChild(triangle);
    }
}
