CREATE DATABASE consejos;
USE consejos;

CREATE TABLE consejos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo TEXT NOT NULL,
  valoracion INT CHECK (valoracion BETWEEN 0 AND 10),
  efectividad INT CHECK (efectividad BETWEEN 0 AND 10),
  tipo VARCHAR(50),
  resumen TEXT NOT NULL,
  descripcion TEXT NOT NULL,
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuarios (
  login VARCHAR(50) PRIMARY KEY,
  password VARCHAR(255)
);

--Ejemplo de usuarios basico
INSERT INTO usuario (login, password) VALUES
('admin', '12345678');

-- Ejemplo de consejos basico
INSERT INTO consejos (titulo, valoracion, efectividad, tipo, resumen, descripcion) VALUES
('Consejo 1', 8, 9, 'Malware', 'Resumen del consejo 1', 'Descripción detallada del consejo 1'),
('Consejo 2', 7, 6, 'Hacking Etico', 'Resumen del consejo 2', 'Descripción detallada del consejo 2'),
('Consejo 3', 9, 10, 'Otros', 'Resumen del consejo 3', 'Descripción detallada del consejo 3'),
('Consejo 4', 5, 4, 'Otros', 'Resumen del consejo 4', 'Descripción detallada del consejo 4'),
('Consejo 5', 6, 7, 'Malware', 'Resumen del consejo 5', 'Descripción detallada del consejo 5');