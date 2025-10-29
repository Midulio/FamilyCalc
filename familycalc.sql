-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2025 a las 20:24:19
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `familycalc`
--

CREATE TABLE usuarios (
  id_usuarios INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) DEFAULT NULL,
  email VARCHAR(50) NOT NULL,
  PASSWORD BLOB DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE casa (
  id_casa INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_usuarios INT(11) DEFAULT NULL,
  nombre VARCHAR(50) DEFAULT NULL,
  calle VARCHAR(50) DEFAULT NULL,
  numero INT(11) DEFAULT NULL,
  localidad VARCHAR(50) DEFAULT NULL,
  provincia VARCHAR(50) NOT NULL,
  CONSTRAINT fk_casa_usuarios FOREIGN KEY (id_usuarios)
      REFERENCES usuarios(id_usuarios)
      ON DELETE SET NULL
      ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `casa` (`nombre`, `calle`, `numero`, `localidad`, `provincia`) VALUES
('Grypinski', NULL, '333', 'lanus', 'buenos aires');

CREATE TABLE Servicios (
    id_servicio INT AUTO_INCREMENT PRIMARY KEY,
    Servicio VARCHAR(50) NOT NULL,
    Descripcion TEXT
);

INSERT INTO Servicios (Servicio, Descripcion) VALUES
('Entretenimiento', 'Gastos relacionados con ocio y diversión, como cine, streaming, eventos o salidas.'),
('Indumentaria', 'Compras de ropa, calzado y accesorios personales.'),
('Salud', 'Gastos médicos, medicamentos, consultas o tratamientos.'),
('Videojuegos o Suscripciones', 'Pagos de servicios digitales como juegos online, plataformas de streaming o membresías.'),
('Viajes', 'Gastos de transporte, alojamiento y actividades turísticas.'),
('Regalos', 'Compras destinadas a obsequios para otras personas.'),
('Cuentas Bancarias', 'Movimientos o cargos vinculados a cuentas bancarias o tarjetas.'),

CREATE TABLE persona (
  id_persona INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_casa INT(11) DEFAULT NULL,
  nombre VARCHAR(50) DEFAULT NULL,
  apellido VARCHAR(50) DEFAULT NULL,
  sexo VARCHAR(10) DEFAULT NULL,
  CONSTRAINT fk_persona_casa FOREIGN KEY (id_casa)
      REFERENCES casa(id_casa)
      ON DELETE SET NULL
      ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `persona` (`nombre`, `apellido`, `sexo`) VALUES
('tizi', 'AAAA', 'Femenino'),
('viky', 'aaaaaaa', 'Otro'),
('nico', 'aaaa', 'Masculino');

CREATE TABLE movimientos (
  id_movimientos INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_servicio INT(11) DEFAULT NULL,
  id_casa INT(11) DEFAULT NULL,
  id_persona INT(11) DEFAULT NULL,
  importe INT(11) DEFAULT NULL,
  fecha_ingreso DATE DEFAULT NULL,
  estados VARCHAR(100) DEFAULT NULL,
  tipo_de_gastos VARCHAR(100) DEFAULT NULL,
  CONSTRAINT fk_movimientos_servicios FOREIGN KEY (id_servicio)
      REFERENCES Servicios(id_servicio)
      ON DELETE SET NULL
      ON UPDATE CASCADE,
  CONSTRAINT fk_movimientos_casa FOREIGN KEY (id_casa)
      REFERENCES casa(id_casa)
      ON DELETE SET NULL
      ON UPDATE CASCADE,
  CONSTRAINT fk_movimientos_persona FOREIGN KEY (id_persona)
      REFERENCES persona(id_persona)
      ON DELETE SET NULL
      ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;