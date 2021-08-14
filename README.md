# Control de Vacunacion COVID-19 / Centrarecursos

Proyecto para la Prueba Técnica de programador de Centrarecursos. El proyecto consiste en una pagina simple para realizar un CRUD para el control y seguimiento de la vacunación de los empleados de una empresa.

## Servidor de PHP

Se utilizo un servidor de Apache con `XAMMP` para el servidor de desarrollo. Se debe pegar toda la carpeta del proyecto en la ruta de `XAMMP` donde fue instalado, en mi caso la tengo en la siguiente ruta `D:\xampp\htdocs\prueba_centrarecursos`. Luego para ejecutar la aplicacion principal navegar a `http://localhost/prueba_centrarecursos/index.php`.

## Base de Datos

Se utilizo la Base de Datos MySQL Server, para que la aplicacion se ejecute correctamente se deben crear una base de datos llamada `vacunacioncentrarecursos` y luego correr los scripts de creación de la tabla y los procedimientos almacenados. Ubicados en la carpeta `/database`. También se necesita modificar linea 5 de código del archivo `db.php` modificando el nombre del servidor de la máquina donde se vaya a ejecutar:
```
$serverName = "FIGUEROA-OMEN\SQLEXPRESS"; //serverName\instanceName
```

## Pruebas de Aplicación

Listado de Usuarios en el Sistema de Vacunación:
![agregar](/images/lista.png)

Agregando un Usuario al Sistema de Vacunación:
![agregar](/images/agregar.png)

Editando un Usuario del Sistema de Vacunación:
![editar](/images/editar.png)

Eliminando un Usuario del Sistema de Vacunación
![eliminar](/images/eliminar.png)