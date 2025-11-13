CREATE DATABASE IF NOT EXISTS youtube;
USE youtube;

CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO productos (nombre, descripcion, precio) VALUES 
('Laptop HP', 'Laptop de 15 pulgadas, 8GB RAM', 599.99),
('Mouse Inalámbrico', 'Mouse ergonómico inalámbrico', 25.50),
('Teclado Mecánico', 'Teclado mecánico RGB', 89.99);