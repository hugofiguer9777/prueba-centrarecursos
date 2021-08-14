CREATE SCHEMA `vacunacioncentrarecursos` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;

USE vacunacioncentrarecursos;

CREATE TABLE usuario (
    id_usuario int IDENTITY(1,1) PRIMARY KEY,
    nombre varchar(100) NOT NULL,
    puesto_laboral varchar(100) NOT NULL,
    vacuna_administrada varchar(100) NOT NULL,
    fecha_primer_dosis datetime NOT NULL,
    fecha_segunda_dosis datetime NOT NULL,
    estado_vacunacion varchar(25) NOT NULL
);

TRUNCATE TABLE usuario;

Go
CREATE PROCEDURE UsuariosProc(@id_usuario INTEGER = 0, @nombre NVARCHAR(100) = '', @puesto_laboral NVARCHAR(100) = '', @vacuna_administrada NVARCHAR(100) = '', @fecha_primer_dosis DATETIME = '', @estado_vacunacion NVARCHAR(25) = '', @StatementType NVARCHAR(20) = '')
AS BEGIN
	Declare @segunda_dosis as DATETIME

	IF @StatementType = 'Insert'
        BEGIN
			IF @vacuna_administrada = 'Sinopharm'
				BEGIN
					SET @segunda_dosis = DATEADD(WEEK,4, @fecha_primer_dosis)
				END
			ELSE IF @vacuna_administrada = 'AstraZeneca'
				BEGIN
					SET @segunda_dosis = DATEADD(WEEK,8, @fecha_primer_dosis)
				END
			ELSE IF @vacuna_administrada = 'Sputnik V'
				BEGIN
					SET @segunda_dosis = DATEADD(DAY,60, @fecha_primer_dosis)
				END
			ELSE IF @vacuna_administrada = 'Pfizer'
				BEGIN
					SET @segunda_dosis = DATEADD(DAY,21, @fecha_primer_dosis)
				END
			ELSE IF @vacuna_administrada = 'Moderna'
				BEGIN
					SET @segunda_dosis = DATEADD(DAY,28, @fecha_primer_dosis)
				END
			ELSE IF @vacuna_administrada = 'Janssen'
				BEGIN
					SET @segunda_dosis = @fecha_primer_dosis
				END
			INSERT INTO usuario(nombre, puesto_laboral, vacuna_administrada, fecha_primer_dosis, fecha_segunda_dosis, estado_vacunacion)
			VALUES (@nombre, @puesto_laboral, @vacuna_administrada, @fecha_primer_dosis, @segunda_dosis, @estado_vacunacion)
        END
	
	IF @StatementType = 'Select'
		BEGIN
			SELECT * FROM usuario;
		END

	IF @StatementType = 'Detail'
		BEGIN
			SELECT * FROM usuario WHERE id_usuario = @id_usuario
		END

	IF @StatementType = 'Update'
		BEGIN
			UPDATE usuario SET nombre = @nombre, puesto_laboral = @puesto_laboral, estado_vacunacion = @estado_vacunacion
			WHERE id_usuario = @id_usuario
		END

	IF @StatementType = 'Delete'
		BEGIN
			DELETE FROM usuario
            WHERE id_usuario = @id_usuario
		END
END

EXEC UsuariosProc @nombre = 'Hugo', @puesto_laboral = 'Developer', @vacuna_administrada = 'Moderna', @fecha_primer_dosis = '2021/08/14', @estado_vacunacion = 'En proceso', @StatementType = 'Insert';