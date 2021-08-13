CREATE SCHEMA `vacunacioncentrarecursos` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;

USE vacunacioncentrarecursos;

CREATE TABLE usuario (
    id_usuario int IDENTITY(1,1) PRIMARY KEY,
    nombre varchar(100) NOT NULL,
    puesto_laboral varchar(100) NOT NULL,
    vacuna_administrada varchar(100) NOT NULL,
    fecha_primer_dosis varchar(25) NOT NULL,
    fecha_segunda_dosis varchar(25) NOT NULL,
    estado_vacunacion varchar(25) NOT NULL
);