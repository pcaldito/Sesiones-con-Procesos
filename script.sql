use 'sesiones';
CREATE TABLE usuario(
    idUsuario tinyint unsigned AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(50) NOT NULL,
    correo varchar(255) NOT NULL,
    contraseña char(8) NOT NULL,
    telefono char(9) NOT NULL
);

INSERT INTO usuario(nombre,correo,contraseña,telefono) VALUES ('Pablo','pablocalditogomez@gmail.com','123456','00000');
INSERT INTO usuario(nombre,correo,contraseña,telefono) VALUES ('Adrian','adrianmelissa@gmail.com','123456','00000');
INSERT INTO usuario(nombre,correo,contraseña,telefono) VALUES ('Sara','sararamirez@gmail.com','123456','00000');