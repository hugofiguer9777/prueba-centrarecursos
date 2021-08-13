<?php

include ("db.php");

if (isset($_POST['guardar_vacuna'])) {
    $nombre = $_POST['nombre'];
    $puesto = $_POST['puesto_laboral'];
    $vacuna = $_POST['vacuna_administrada'];
    $primera_dosis = $_POST['fecha_primer_dosis'];
    $segunda_dosis = $_POST['fecha_segunda_dosis'];
    $estado = $_POST['estado_vacunacion'];
    // echo $nombre;
    // echo $puesto;
    // echo $vacuna;
    // echo $primera_dosis;
    // echo $segunda_dosis;
    // echo $estado;

    $query = "INSERT INTO usuario(nombre, puesto_laboral, vacuna_administrada, fecha_primer_dosis, fecha_segunda_dosis, estado_vacunacion) VALUES('$nombre','$puesto','$vacuna','$primera_dosis','$segunda_dosis','$estado')";
    $result = sqlsrv_query($conn, $query);

    if (!$result) {
        die(print_r(sqlsrv_errors(), true));
    }

    $_SESSION['mensaje'] = 'Usuario registrado';
    $_SESSION['tipo_mensaje'] = 'success';

    header("Location: index.php");
}

?>