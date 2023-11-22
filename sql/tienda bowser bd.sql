-- Elimina la base de datos si existe
DROP SCHEMA IF EXISTS tiendabowser;

-- Crea la base de datos
CREATE SCHEMA tiendabowser;
USE tiendabowser;

-- Establece la conexión y otorga permisos
CREATE USER 'usuario'@'%' IDENTIFIED BY 'clave';
GRANT ALL PRIVILEGES ON tiendabowser.* TO 'usuario'@'%';
FLUSH PRIVILEGES;

-- Define las tablas
CREATE TABLE tiendabowser.categoria (
  id_categoria INT NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(30) NOT NULL,
  ruta_imagen VARCHAR(1024),
  activo BOOLEAN,
  PRIMARY KEY (id_categoria)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

CREATE TABLE tiendabowser.juego (
  id_juego INT NOT NULL AUTO_INCREMENT,
  id_categoria INT NOT NULL,
  nombre VARCHAR(30) NOT NULL,
  consola VARCHAR(1600) NOT NULL,
  precio DOUBLE,
  existencias INT,
  ruta_imagen VARCHAR(1024),
  activo BOOLEAN,
  PRIMARY KEY (id_juego),
  FOREIGN KEY (id_categoria) REFERENCES tiendabowser.categoria(id_categoria)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

CREATE TABLE tiendabowser.accesorio (
  id_accesorio INT NOT NULL AUTO_INCREMENT,
  id_categoria INT NOT NULL,
  nombre VARCHAR(30) NOT NULL,
  precio DOUBLE,
  existencias INT,
  ruta_imagen VARCHAR(1024),
  activo BOOLEAN,
  PRIMARY KEY (id_accesorio),
  FOREIGN KEY (id_categoria) REFERENCES tiendabowser.categoria(id_categoria)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

CREATE TABLE tiendabowser.consola (
  id_consola INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(30) NOT NULL,
  id_categoria INT NOT NULL,
  precio DOUBLE,
  existencias INT,
  ruta_imagen VARCHAR(1024),
  activo BOOLEAN,
  PRIMARY KEY (id_consola),
  FOREIGN KEY (id_categoria) REFERENCES tiendabowser.categoria(id_categoria)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

CREATE TABLE tiendabowser.usuario (
  id_usuario INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(20) NOT NULL,
  password VARCHAR(512) NOT NULL,
  nombre VARCHAR(20) NOT NULL,
  apellidos VARCHAR(30) NOT NULL,
  correo VARCHAR(50),  -- Ajusta el tamaño según tus necesidades
  telefono VARCHAR(15),
  ruta_imagen VARCHAR(1024),
  activo BOOLEAN,
  PRIMARY KEY (id_usuario),
  UNIQUE INDEX idx_username (username)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

CREATE TABLE tiendabowser.rol (
  id_rol INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(20),
  id_usuario INT,
  PRIMARY KEY (id_rol),
  FOREIGN KEY (id_usuario) REFERENCES tiendabowser.usuario(id_usuario)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;
