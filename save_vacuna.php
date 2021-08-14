<?php

include ("db.php");

if (isset($_POST['guardar_vacuna'])) {
    $nombre = $_POST['nombre'];
    $puesto = $_POST['puesto_laboral'];
    $vacuna = $_POST['vacuna_administrada'];
    $primera_dosis = $_POST['fecha_primer_dosis'];
    $estado = $_POST['estado_vacunacion'];
    // echo $nombre;
    // echo $puesto;
    // echo $vacuna;
    // echo $primera_dosis;
    // echo $estado;

    $query = "EXEC UsuariosProc @nombre = '$nombre', @puesto_laboral = '$puesto', @vacuna_administrada = '$vacuna', @fecha_primer_dosis = '$primera_dosis', @estado_vacunacion = '$estado', @StatementType = 'Insert'";
    $result = sqlsrv_query($conn, $query);

    if (!$result) {
        die(print_r(sqlsrv_errors(), true));
    }

    $_SESSION['mensaje'] = 'Usuario registrado';
    $_SESSION['tipo_mensaje'] = 'success';

    header("Location: index.php");
}

?>