DROP TABLE IF EXISTS CATEGORIAS, ADMINISTRADORES, USUARIOS, OFERTAS, OFERTAS_TEMPORALES, OFERTAS_STOCK, COMPRAS, CATEGORIAS_OFERTAS;
CREATE TABLE
CATEGORIAS(

    id bigint NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(40) NOT NULL,
    descripcion VARCHAR(200),
    PRIMARY KEY (id)

);  
CREATE TABLE
ADMINISTRADORES(

    id bigint NOT NULL AUTO_INCREMENT,
    apellido VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL UNIQUE,
    nick VARCHAR(30) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    pass VARCHAR(30) NOT NULL,
    PRIMARY KEY (id)

);    
CREATE TABLE
USUARIOS(

	id bigint NOT NULL AUTO_INCREMENT,
	nick varchar(100) NOT NULL,
	nombre varchar(100) NOT NULL,
	apellido varchar(100) NOT NULL,
	email varchar(100) NOT NULL,
	fechaNac date NOT NULL,
	celular varchar(20) NOT NULL,
	password varchar(100) NOT NULL,
	edad int(100) NOT NULL,
    PRIMARY KEY (id)

);
CREATE TABLE
OFERTAS(

    id bigint NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(40) NOT NULL,
    imagen VARCHAR(100), 
    descripcion VARCHAR(200), 
    descripcion_corta VARCHAR(80),
    precio DECIMAL(19,2),
    PRIMARY KEY(id)        

);
CREATE TABLE
OFERTAS_TEMPORALES(

    id bigint NOT NULL,
    fecha_fin DATETIME NOT NULL,
    fecha_inicio DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id) REFERENCES OFERTAS(id) ON DELETE CASCADE

);
CREATE TABLE
OFERTAS_STOCK(

    id bigint NOT NULL,
    stock int NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id) REFERENCES OFERTAS(id) ON DELETE CASCADE

);

/*TABLAS RELACION*/

CREATE TABLE
COMPRAS(

    id_compra bigint NOT NULL AUTO_INCREMENT,
    id_oferta bigint NOT NULL,
    id_usuario bigint NOT NULL,
    PRIMARY KEY(id_compra),
    FOREIGN KEY (id_oferta) REFERENCES OFERTAS(id) ON DELETE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES USUARIOS(id) ON DELETE CASCADE
    
);
CREATE TABLE
CATEGORIAS_OFERTAS(

    id_categoria bigint NOT NULL,
    id_oferta bigint NOT NULL,
    PRIMARY KEY(id_categoria,id_oferta),
    FOREIGN KEY(id_categoria) REFERENCES CATEGORIAS(id) ON DELETE CASCADE,
    FOREIGN KEY(id_oferta) REFERENCES OFERTAS(id) ON DELETE CASCADE

);


