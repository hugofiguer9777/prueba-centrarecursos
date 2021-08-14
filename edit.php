<?php

include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "EXEC UsuariosProc @id_usuario = '$id', @StatementType = 'Detail'";
    $result = sqlsrv_query($conn, $query);

    if ($result) {
        $result = sqlsrv_fetch_array($result);
        $nombre = $result['nombre'];
        $puesto = $result['puesto_laboral'];
        $vacuna = $result['vacuna_administrada'];
        $primera_dosis = $result['fecha_primer_dosis']->format('Y/m/d');
        $segunda_dosis = $result['fecha_segunda_dosis']->format('Y/m/d');;
        $estado = $result['estado_vacunacion'];
    }
}

if(isset($_POST['editar_vacuna'])) {
    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $puesto = $_POST['puesto_laboral'];
    $estado = $_POST['estado_vacunacion'];

    $query = "EXEC UsuariosProc @id_usuario = '$id', @nombre = '$nombre', @puesto_laboral = '$puesto', @estado_vacunacion = '$estado', @StatementType = 'Update'";
    $result = sqlsrv_query($conn, $query);

    if (!$result) {
        die(print_r(sqlsrv_errors(), true));
    }

    $_SESSION['mensaje'] = 'Usuario actualizado';
    $_SESSION['tipo_mensaje'] = 'primary';

    header("Location: index.php");
}

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $id; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre usuario" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="puesto_laboral" value="<?php echo $puesto; ?>" class="form-control" placeholder="Puesto laboral">
                    </div>
                    <div class="form-group">
                        <input type="text" name="vacuna_administrada" value="<?php echo $vacuna; ?>" class="form-control" placeholder="Puesto laboral" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" name="fecha_primer_dosis" value="<?php echo $primera_dosis; ?>" class="form-control" placeholder="Fecha primera dosis" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" name="fecha_segunda_dosis" value="<?php echo $segunda_dosis; ?>" class="form-control" placeholder="Fecha segunda dosis" readonly>
                    </div>
                    <div class="form-group">
                        <select class="form-select" name="estado_vacunacion">
                            <option selected><?php echo $estado; ?></option>
                            <option value="Protegido">Protegido</option>
                            <option value="En progreso">En progreso</option>
                            <option value="En riesgo">En riesgo</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success" name="editar_vacuna" value="Editar">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>