CREATE DATABASE ipss_asb324;

CREATE USER 'ipss_asb324'@'localhost' IDENTIFIED BY 'l4cl4v3-1p55';

GRANT ALL PRIVILEGES ON ipss_asb324.* TO 'ipss_asb324'@'localhost';

FLUSH PRIVILEGES;

-- TABLA DE EJEMPLO EN CLASES

CREATE TABLE mantenedor(
    id INT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    activo BOOLEAN NOT NULL DEFAULT FALSE
);

--ACTIVO ES UNA BANDERA (FLAG) Y permite desactivar un dato para que no sea mostrado.

INSERT INTO mantenedor (id, nombre, activo) VALUES 
(1, 'Primero', true),
(2, 'Segundo', true),
(3, 'Tercero', false);

SELECT * FROM mantenedor;