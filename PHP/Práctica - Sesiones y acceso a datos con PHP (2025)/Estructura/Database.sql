--Creacion de la base de datos principal y tablas
CREATE DATABASE hoteles;

USE hoteles;

CREATE TABLE usuarios (
    login VARCHAR(50) PRIMARY KEY,
    password VARCHAR(50) NOT NULL
);

CREATE TABLE hoteles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    provincia VARCHAR(50) NOT NULL,
    estrellas INT NOT NULL
);

--Inserciones de ejemplo de usuarios y hoteles
--Usuarios
INSERT INTO usuarios (login, password) VALUES
('admin', 'admin123'),
('lucia', 'lucia456'),
('mario', 'mariopass'),
('ana', 'ana789'),
('david', 'david321'),
('julia', 'julia654'),
('carlos', 'carlospass'),
('marta', 'marta123'),
('raul', 'raulpass'),
('nerea', 'nerea789');

--Hoteles
INSERT INTO hoteles (nombre, provincia, estrellas) VALUES
('Hotel Sol Mediterráneo', 'Alicante', 4),
('Gran Hotel Atlántico', 'Cádiz', 5),
('Posada del Norte', 'Cantabria', 3),
('Hotel Sierra Nevada', 'Granada', 4),
('Hostal Los Pinos', 'Jaén', 2),
('Hotel Mar Azul', 'Valencia', 3),
('Hotel Mirador del Duero', 'Zamora', 4),
('Resort La Costa', 'Málaga', 5),
('Hotel Central', 'Madrid', 3),
('Hotel Verde Montaña', 'Asturias', 4);
