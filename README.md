API REST con PHP y MySQL
Integrantes
Luis Calderón

Luis Ortega

Descripción
Implementación de una API RESTful en PHP para gestión de productos. Desarrollo completo con métodos HTTP POST, GET y PUT, incluyendo pruebas exhaustivas con Postman.

Objetivos del Proyecto
Crear una API REST funcional con endpoints para productos

Implementar operaciones CRUD (Crear, Leer, Actualizar)

Realizar pruebas integrales con Postman

Aplicar mejores prácticas de desarrollo de APIs

Tecnologías Utilizadas
Backend: PHP 8.3 con MySQL

Herramientas de Prueba: Postman

Servidor: WAMP Server

Formato de Datos: JSON

Protocolo: HTTP/REST

Aprendizajes Principales
Estructura y principios de APIs REST

Implementación de métodos HTTP (POST, GET, PUT)

Manejo de respuestas JSON en PHP

Uso de Postman para testing de endpoints

Control de errores y códigos HTTP apropiados

Centralización de lógica con switch statement

Endpoints Implementados
POST /api/productos
Funcion: Crear nuevo producto

Body: JSON con datos del producto

Respuesta: 201 Created + datos del producto

GET /api/productos
Funcion: Listar todos los productos

Respuesta: 200 OK + array de productos

PUT /api/productos/{id}
Funcion: Actualizar producto existente

Body: JSON con datos actualizados

Respuesta: 200 OK + producto actualizado

Características Técnicas
Estructura centralizada con switch statement

Validación de datos de entrada

Códigos HTTP semánticos (200, 201, 400, 404, 500)

Respuestas en formato JSON estandarizado

Control de errores robusto

Conexión segura a base de datos MySQL

Uso con Postman
POST: Enviar JSON con datos de producto

GET: Solicitar lista de productos

PUT: Enviar JSON con actualizaciones por ID

Verificar códigos de respuesta y datos JSON

Desarrollado para el laboratorio de Ingeniería Web - Universidad Tecnológica de Panamá - II Semestre 2025
