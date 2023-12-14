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
create TABLE tiendabowser.juego (
  id_juego INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(300) NOT NULL,
  consola VARCHAR(1600) NOT NULL,
  precio DOUBLE,
  existencias INT,
  ruta_imagen VARCHAR(1024),
  activo BOOLEAN,
  PRIMARY KEY (id_juego)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

CREATE TABLE tiendabowser.accesorio (
  id_accesorio INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(300) NOT NULL,
  precio DOUBLE,
  existencias INT,
  ruta_imagen VARCHAR(1024),
  activo BOOLEAN,
  PRIMARY KEY (id_accesorio)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

CREATE TABLE tiendabowser.consola (
  id_consola INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(300) NOT NULL,
  precio DOUBLE,
  existencias INT,
  ruta_imagen VARCHAR(1024),
  activo BOOLEAN,
  PRIMARY KEY (id_consola)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

CREATE TABLE tiendabowser.usuario (
  id_usuario INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(20) NOT NULL,
  password VARCHAR(512) NOT NULL,
  nombre VARCHAR(20) NOT NULL,
  apellidos VARCHAR(30) NOT NULL,
  correo VARCHAR(50),  -- Ajusta el tamaño según tus necesidades
  telefono VARCHAR(15),
  activo BOOLEAN,
  PRIMARY KEY (id_usuario),
  UNIQUE INDEX idx_username (username)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

create TABLE tiendabowser.rol (
  id_rol INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(20),
  id_usuario INT,
  PRIMARY KEY (id_rol),
  FOREIGN KEY (id_usuario) REFERENCES tiendabowser.usuario(id_usuario)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4;

-- Insertar usuario de prueba

-- Insertar juego 1
INSERT INTO tiendabowser.juego (nombre, consola, precio, existencias, ruta_imagen, activo)
VALUES ('The Legend of Zelda: Breath of the Wild', 'Nintendo Switch', 59.99, 100, 'https://media.vandal.net/m/43030/the-legend-of-zelda-breath-of-the-wild-201732131429_1.jpg', true);

-- Insertar juego 2
INSERT INTO tiendabowser.juego (nombre, consola, precio, existencias, ruta_imagen, activo)
VALUES ('Cyberpunk 2077', 'PlayStation 4', 49.99, 75, 'https://i.blogs.es/b109e9/cyberpunk2077-johnny-v-rgb_en/1366_2000.jpg', true);

-- Insertar juego 3
INSERT INTO tiendabowser.juego (nombre, consola, precio, existencias, ruta_imagen, activo)
VALUES ('Assassins Creed Valhalla', 'Xbox Series X', 54.99, 120, 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6412/6412179_sd.jpg', true);

-- Insertar juego 4
INSERT INTO tiendabowser.juego (nombre, consola, precio, existencias, ruta_imagen, activo)
VALUES ('FIFA 24', 'PlayStation 5', 59.99, 90, 'https://www.unimart.com/cdn/shop/files/sony-videojuego-ea-sports-fc24-playstation-5-ps5.jpg?v=1695735312', true);

-- Insertar juego 5
INSERT INTO tiendabowser.juego (nombre, consola, precio, existencias, ruta_imagen, activo)
VALUES ('Call of Duty: MW', 'PC', 59.99, 200, 'https://howlongtobeat.com/games/63110_Call_of_Duty_Modern_Warfare.jpeg', true);

-- Insertar juego 6
INSERT INTO tiendabowser.juego (nombre, consola, precio, existencias, ruta_imagen, activo)
VALUES ('Animal Crossing: New Horizons', 'Nintendo Switch', 49.99, 80, 'https://juegosdigitalescostarica.com/files/images/productos/1637887885-animal-crossing-new-horizons.jpg', true);

-- Insertar juego 7
INSERT INTO tiendabowser.juego (nombre, consola, precio, existencias, ruta_imagen, activo)
VALUES ('Spider-Man: Miles Morales', 'PlayStation 5', 49.99, 60, 'https://soporteconsolascr.com/cdn/shop/products/3_f94620b4-6a67-414a-bbab-ecdd3cb0d7ea_1200x1200.png?v=1623693147', true);

-- Insertar juego 8
INSERT INTO tiendabowser.juego (nombre, consola, precio, existencias, ruta_imagen, activo)
VALUES ('Doom Eternal', 'Xbox One', 39.99, 110, 'https://images-na.ssl-images-amazon.com/images/I/81zVNA8JzhL._AC_UL600_SR600,600_.jpg', true);

-- Insertar juego 9
INSERT INTO tiendabowser.juego (nombre, consola, precio, existencias, ruta_imagen, activo)
VALUES ('Among Us', 'PC', 4.99, 150, 'https://play-lh.googleusercontent.com/8ddL1kuoNUB5vUvgDVjYY3_6HwQcrg1K2fd_R8soD-e2QYj8fT9cfhfh3G0hnSruLKec', true);

-- Insertar juego 10
INSERT INTO tiendabowser.juego (nombre, consola, precio, existencias, ruta_imagen, activo)
VALUES ('Halo Infinite', 'Xbox Series X', 59.99, 70, 'https://juegosdigitalescostarica.com/files/images/productos/1644613688-halo-infinite-xbox-series-xs.jpg', true);





-- Insertar accesorio 1
INSERT INTO tiendabowser.accesorio (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Control Xbox Series X', 49.99, 50, 'https://www.intelec.co.cr/image/cache/catalog/catalogo/Juegos/QAS-0000-1591x1516.jpg', true);

-- Insertar accesorio 2
INSERT INTO tiendabowser.accesorio (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Auriculares Gaming Logitech G Pro', 79.99, 30, 'https://extremetechcr.com/tienda/20652/logitech-g-pro-gaming.jpg', true);

-- Insertar accesorio 3
INSERT INTO tiendabowser.accesorio (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Teclado mecánico Corsair K95', 129.99, 20, 'https://www.aostores.com/media/catalog/product/cache/7feeb55cf393e20da106452982bfe98b/7/1/7193jl8pejl._ac_sl1500_.jpg', true);

-- Insertar accesorio 4
INSERT INTO tiendabowser.accesorio (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Control PlayStation 5', 54.99, 40, 'https://walmartcr.vtexassets.com/arquivos/ids/463200/Control-Sony-PS5-Dualsense-1-93021.jpg?v=638326893714900000', true);

-- Insertar accesorio 5
INSERT INTO tiendabowser.accesorio (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Cargador para Nintendo Switch', 19.99, 60, 'https://i0.wp.com/tiendasarcadia.com/wp-content/uploads/nc/p/4/6/4/464.jpg?fit=1500%2C1500&ssl=1', true);

-- Insertar accesorio 6
INSERT INTO tiendabowser.accesorio (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Mouse Gaming Razer DeathAdder', 39.99, 25, 'https://www.unimart.com/cdn/shop/products/19-12_1_3229b171-93c7-4eb0-9fc8-9830db9e956a.jpg?v=1673879787', true);

-- Insertar accesorio 7
INSERT INTO tiendabowser.accesorio (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Auriculares Inalámbricos Apple AirPods', 159.99, 15, 'https://innovacellcr.com/cdn/shop/files/audifonos-inalambricos-apple-airpods-3ra-gen-innovacell-1-24280807407705.png?v=1699022589', true);

-- Insertar accesorio 8
INSERT INTO tiendabowser.accesorio (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Base de Carga para Mandos PS4', 29.99, 35, 'https://i.blogs.es/4a9161/dualshock-charging-station/1366_2000.jpeg', true);

-- Insertar accesorio 9
INSERT INTO tiendabowser.accesorio (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Teclado y Ratón inalámbricos Logitech', 69.99, 18, 'https://i.ibb.co/Hx380GQ/TECLADO-Y-MOUSE-LOGITECH-INALAMRICO-MK270.webp', true);

-- Insertar accesorio 10
INSERT INTO tiendabowser.accesorio (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Control Nintendo Switch Pro', 59.99, 22, 'https://www.gamerscr.com/web/image/453605/control-nintendo-switch-pro-costa-rica.jpg?access_token=0700c384-d799-40db-ae9c-f298d73a9404', true);




-- Insertar consola 1
INSERT INTO tiendabowser.consola (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Nintendo Switch', 299.99, 30, 'https://vastago.cr/wp-content/uploads/2019/09/Nintendo-Switch-con-Neon-Blue-y-Neon-Red-Joy-%E2%80%91-Con-HAC-001.jpg', true);

-- Insertar consola 2
INSERT INTO tiendabowser.consola (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('PlayStation 5', 499.99, 15, 'https://www.gollo.com/media/catalog/product/c/o/consola_ps5_ghz6ayr27stbbgyp.jpg?optimize=medium&bg-color=255,255,255&fit=bounds&height=1040&width=1040&canvas=1040:1040', true);

-- Insertar consola 3
INSERT INTO tiendabowser.consola (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Xbox Series X', 499.99, 20, 'https://i5.walmartimages.com/seo/Xbox-Series-X-Video-Game-Console-Black_9f8c06f5-7953-426d-9b68-ab914839cef4.5f15be430800ce4d7c3bb5694d4ab798.jpeg', true);

-- Insertar consola 4
INSERT INTO tiendabowser.consola (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Nintendo Switch Lite', 199.99, 25, 'https://www.adntienda.com/web/image/product.image/117663/image_1024/Consola%20Nintendo%20Switch%20Lite?unique=1eecdea', true);

-- Insertar consola 5
INSERT INTO tiendabowser.consola (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('PlayStation 4 Pro', 399.99, 10, 'https://tibas.solutekla.com/photo/1/sony/video_juegos/consola_playstation_ps4_pro_hw_1tb_cuh7115b/consola_playstation_ps4_pro_hw_1tb_cuh7115b_0001', true);

-- Insertar consola 6
INSERT INTO tiendabowser.consola (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Xbox One X', 399.99, 12, 'https://m.media-amazon.com/images/I/61LVSqb4BHL.jpg', true);

-- Insertar consola 7
INSERT INTO tiendabowser.consola (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Nintendo 3DS XL', 149.99, 18, 'https://m.media-amazon.com/images/I/81cJFBmx-3L.jpg', true);

-- Insertar consola 8
INSERT INTO tiendabowser.consola (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('PlayStation Vita', 129.99, 8, 'https://m.media-amazon.com/images/I/81ocPLCedaL._SL1500_.jpg', true);

-- Insertar consola 9
INSERT INTO tiendabowser.consola (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Xbox Series S', 299.99, 22, 'https://tiendasarcadia.com/wp-content/uploads/2020/11/xbox-series-800x800-1.jpeg', true);

-- Insertar consola 10
INSERT INTO tiendabowser.consola (nombre, precio, existencias, ruta_imagen, activo)
VALUES ('Nintendo Wii U', 249.99, 14, 'https://fs-prod-cdn.nintendo-europe.com/media/images/10_share_images/systems_11/wii_u_11/H2x1_generic_WiiU_image1280w.jpg', true);