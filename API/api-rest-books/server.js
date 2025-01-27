// Configuración inicial
const express = require('express');
const app = express();
const port = 3000;

// Middleware para parsear JSON
app.use(express.json());

// Almacenamiento temporal de libros (en producción usarías una base de datos)
let books = [
    {
        id: 1,
        title: "Don Quijote",
        author: "Miguel de Cervantes",
        year: 1605
    }
];

// Función auxiliar para validar libro
const validateBook = (book) => {
    if (!book.title || !book.author || !book.year) {
        return false;
    }
    return true;
};

// GET /books - Obtener todos los libros
app.get('/books', (req, res) => {
    res.json(books);
});

// GET /books/:id - Obtener un libro por ID
app.get('/books/:id', (req, res) => {
    const book = books.find(b => b.id === parseInt(req.params.id));
    
    if (!book) {
        return res.status(404).json({ message: "Libro no encontrado" });
    }
    
    res.json(book);
});

// POST /books - Crear un nuevo libro
app.post('/books', (req, res) => {
    if (!validateBook(req.body)) {
        return res.status(400).json({ message: "Datos incompletos. Se requiere título, autor y año" });
    }

    const newBook = {
        id: books.length + 1,
        title: req.body.title,
        author: req.body.author,
        year: req.body.year
    };
    
    books.push(newBook);
    res.status(201).json(newBook);
});

// PUT /books/:id - Actualizar un libro existente
app.put('/books/:id', (req, res) => {
    const bookIndex = books.findIndex(b => b.id === parseInt(req.params.id));
    
    if (bookIndex === -1) {
        return res.status(404).json({ message: "Libro no encontrado" });
    }
    
    if (!validateBook(req.body)) {
        return res.status(400).json({ message: "Datos incompletos. Se requiere título, autor y año" });
    }

    books[bookIndex] = {
        id: parseInt(req.params.id),
        title: req.body.title,
        author: req.body.author,
        year: req.body.year
    };
    
    res.json(books[bookIndex]);
});

// DELETE /books/:id - Eliminar un libro
app.delete('/books/:id', (req, res) => {
    const bookIndex = books.findIndex(b => b.id === parseInt(req.params.id));
    
    if (bookIndex === -1) {
        return res.status(404).json({ message: "Libro no encontrado" });
    }
    
    books.splice(bookIndex, 1);
    res.status(204).send();
});

// Iniciar el servidor
app.listen(port, () => {
    console.log(`API corriendo en http://localhost:${port}`);
});