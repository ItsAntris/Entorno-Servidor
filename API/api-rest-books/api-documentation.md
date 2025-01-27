# Documentación de la API REST de Libros

## 1. Configuración Inicial

```javascript
const express = require('express');
const app = express();
const port = 3000;
```
Esta sección inicial importa Express.js y configura la aplicación básica. Express es un framework web minimalista para Node.js que facilita la creación de APIs. Se define el puerto 3000 como puerto de escucha para el servidor.

## 2. Middleware y Configuración

```javascript
app.use(express.json());
```
Esta línea configura el middleware de Express para parsear automáticamente el cuerpo de las peticiones JSON. Sin este middleware, no podríamos acceder a los datos enviados en el cuerpo de las peticiones POST y PUT.

## 3. Almacenamiento de Datos

```javascript
let books = [
    {
        id: 1,
        title: "Don Quijote",
        author: "Miguel de Cervantes",
        year: 1605
    }
];
```
En esta implementación, usamos un array en memoria para almacenar los libros. En una aplicación real, esto se reemplazaría por una base de datos. El array se inicializa con un libro de ejemplo.

## 4. Función de Validación

```javascript
const validateBook = (book) => {
    if (!book.title || !book.author || !book.year) {
        return false;
    }
    return true;
};
```
Esta función auxiliar valida que los datos de un libro contengan todos los campos requeridos (título, autor y año). Se utiliza antes de crear o actualizar libros.

## 5. Endpoints de la API

### 5.1 GET /books (Obtener todos los libros)
```javascript
app.get('/books', (req, res) => {
    res.json(books);
});
```
- **Método**: GET
- **Ruta**: /books
- **Función**: Retorna la lista completa de libros
- **Respuesta**: Array de objetos libro en formato JSON

### 5.2 GET /books/:id (Obtener un libro específico)
```javascript
app.get('/books/:id', (req, res) => {
    const book = books.find(b => b.id === parseInt(req.params.id));
    
    if (!book) {
        return res.status(404).json({ message: "Libro no encontrado" });
    }
    
    res.json(book);
});
```
- **Método**: GET
- **Ruta**: /books/:id
- **Parámetros**: id - Identificador único del libro
- **Función**: Busca y retorna un libro específico por su ID
- **Manejo de Errores**: Retorna 404 si el libro no existe

### 5.3 POST /books (Crear nuevo libro)
```javascript
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
```
- **Método**: POST
- **Ruta**: /books
- **Cuerpo**: Objeto JSON con title, author y year
- **Función**: Crea un nuevo libro
- **Validación**: Verifica que todos los campos requeridos estén presentes
- **Respuesta**: Retorna el libro creado con código 201

### 5.4 PUT /books/:id (Actualizar libro)
```javascript
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
```
- **Método**: PUT
- **Ruta**: /books/:id
- **Parámetros**: id - Identificador del libro a actualizar
- **Cuerpo**: Objeto JSON con title, author y year
- **Función**: Actualiza un libro existente
- **Validación**: Verifica existencia del libro y campos requeridos
- **Manejo de Errores**: 404 si el libro no existe, 400 si faltan datos

### 5.5 DELETE /books/:id (Eliminar libro)
```javascript
app.delete('/books/:id', (req, res) => {
    const bookIndex = books.findIndex(b => b.id === parseInt(req.params.id));
    
    if (bookIndex === -1) {
        return res.status(404).json({ message: "Libro no encontrado" });
    }
    
    books.splice(bookIndex, 1);
    res.status(204).send();
});
```
- **Método**: DELETE
- **Ruta**: /books/:id
- **Parámetros**: id - Identificador del libro a eliminar
- **Función**: Elimina un libro de la colección
- **Manejo de Errores**: 404 si el libro no existe
- **Respuesta**: 204 No Content en caso de éxito

## 6. Inicialización del Servidor

```javascript
app.listen(port, () => {
    console.log(`API corriendo en http://localhost:${port}`);
});
```
Esta sección final inicia el servidor HTTP en el puerto especificado (3000) y muestra un mensaje en la consola cuando el servidor está funcionando.

## Aspectos Destacados de la Implementación

1. **Manejo de Errores**:
   - Validación de datos de entrada
   - Respuestas de error apropiadas con códigos HTTP
   - Mensajes de error descriptivos

2. **Buenas Prácticas**:
   - Uso de códigos de estado HTTP apropiados
   - Validación de datos centralizada
   - Respuestas JSON consistentes
   - Rutas RESTful bien estructuradas

3. **Limitaciones**:
   - Almacenamiento en memoria (no persistente)
   - Validación básica
   - Sin autenticación/autorización
   - Sin paginación de resultados

