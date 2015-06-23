CREATE TABLE
    categorias
    (
        id_categoria bigint NOT NULL AUTO_INCREMENT,
        nombre_categoria VARCHAR(40) NOT NULL,
        descripcion VARCHAR(200),
        PRIMARY KEY (id_categoria)
    );
  
 
 
  
CREATE TABLE
    administradores
    (
        id_administrador bigint NOT NULL AUTO_INCREMENT,
        apellido VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL UNIQUE,
        nick VARCHAR(30) NOT NULL,
        nombre VARCHAR(30) NOT NULL,
        pass VARCHAR(30) NOT NULL,
        PRIMARY KEY (id_administrador)
    );
    
CREATE TABLE
    usuarios
    (   
        id_usuario bigint NOT NULL AUTO_INCREMENT,
        nick varchar(100) NOT NULL,
	nombre varchar(100) NOT NULL,
	apellido varchar(100) NOT NULL,
	email varchar(100) NOT NULL,
	fechaNac date NOT NULL,
	celular varchar(20) NOT NULL,
	password varchar(100) NOT NULL,
	edad int(100) NOT NULL,
        PRIMARY KEY (id_usuario)
    );
    
CREATE TABLE
    ofertas
    (
        id_oferta bigint NOT NULL AUTO_INCREMENT,
        titulo_oferta VARCHAR(40) NOT NULL,
        imagen VARCHAR(100), 
        descripcion VARCHAR(200), 
        descripcion_corta VARCHAR(80),
        precio DECIMAL(19,2),
        PRIMARY KEY(id_oferta)        
    );
    

    
CREATE TABLE
    ofertas_temporales
    (
        id_oferta bigint NOT NULL,
        fecha_fin DATETIME NOT NULL,
        fecha_inicio DATETIME NOT NULL,
        PRIMARY KEY(id_oferta),
        FOREIGN KEY(id_oferta) REFERENCES ofertas(id_oferta) ON DELETE CASCADE
     );    

CREATE TABLE
    ofertas_hasta_agotar_stock
    (
        id_oferta bigint NOT NULL,
        stock int NOT NULL,
        PRIMARY KEY(id_oferta),
        FOREIGN KEY(id_oferta) REFERENCES ofertas(id_oferta) ON DELETE CASCADE
    );

/*TABLAS RELACION*/

CREATE TABLE

    compras
    (
        id_compra bigint NOT NULL AUTO_INCREMENT,
        id_oferta bigint NOT NULL,
        id_usuario bigint NOT NULL,
        PRIMARY KEY(id_compra),
        FOREIGN KEY (id_oferta) REFERENCES ofertas(id_oferta) ON DELETE CASCADE,
        FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
        
    );
CREATE TABLE
    categorias_de_ofertas
    (
        id_categoria bigint NOT NULL,
        id_oferta bigint NOT NULL,
        PRIMARY KEY(id_categoria,id_oferta),
        FOREIGN KEY(id_categoria) REFERENCES categorias(id_categoria) ON DELETE CASCADE,
        FOREIGN KEY(id_oferta) REFERENCES ofertas(id_oferta) ON DELETE CASCADE
    );


