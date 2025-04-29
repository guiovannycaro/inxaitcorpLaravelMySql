 en la carpeta de bases de datos esta el archivo inxaitbd.sql  para su ejecucion este contien todas las tablas para su creacion en la base de datos para esto
1. para ello primero que todo toca crear la base de datos CREATE DATABASE inxaitbd;
2. luego ejecutar el archivo inxaitbd.sql que esta en la misma carpeta 

3. o copiar y pegar estas consultas para crear las tablas en la base de datos con sus respectivas llaves primarias y foraneas
CREATE TABLE pais (
    idPais INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(100) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla departamento
CREATE TABLE departamento (
    idDepartamento INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    PaisId INT,
    estado BOOLEAN,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (PaisId) REFERENCES pais(idPais)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla ciudad
CREATE TABLE ciudad (
    idCiudad INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    DepartamentoId INT,
    estado BOOLEAN,
	  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (DepartamentoId) REFERENCES departamento(idDepartamento)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla tipo documento
CREATE TABLE tipodocumento (
    idTipodocumento INT AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(100) NOT NULL,
    estado BOOLEAN,
	  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla clientes
CREATE TABLE clientes (
    idCliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    tipoDocumento_id INT,
    numeroDocumento BIGINT,
    ciudadId INT,
    telefono VARCHAR(20) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    fechaCreacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    habeasData BOOLEAN,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tipoDocumento_id) REFERENCES tipodocumento(idTipodocumento),
    FOREIGN KEY (ciudadId) REFERENCES ciudad(idCiudad)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE ganadores (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    cliente_id INT NOT NULL,
    fecha_ganado DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (cliente_id) REFERENCES clientes(idCliente) ON DELETE CASCADE
);

4. en laravel modificar el archivo env en estas lineas
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3305
DB_DATABASE=inxaitbd
DB_USERNAME=root
DB_PASSWORD=

una vez creada la base de datos descargar las fuentes de git y correr laravel

Clonar el repositorio:

git clone https://github.com/usuario/repositorio.git
cd repositorio
Instalar dependencias con Composer:

composer install

Copiar el archivo de entorno .env:

cp .env.example .env

Configurar el archivo .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3305
DB_DATABASE=inxaitbd
DB_USERNAME=root
DB_PASSWORD=
