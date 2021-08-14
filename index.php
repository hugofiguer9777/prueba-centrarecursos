<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-2">

    <div class="row">

        <div class="col-md-4">

            <?php 
            if (isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert-<?= $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['mensaje'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php session_unset(); }?>

            <div class="card card-body">
                <form action="save_vacuna.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre usuario" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="puesto_laboral" class="form-control" placeholder="Puesto laboral">
                    </div>
                    <div class="form-group">
                        <select class="form-select" name="vacuna_administrada">
                            <option selected>Vacuna administrada...</option>
                            <option value="Sinopharm">Sinopharm</option>
                            <option value="AstraZeneca">AstraZeneca</option>
                            <option value="Sputnik V">Sputnik V</option>
                            <option value="Pfizer">Pfizer</option>
                            <option value="Moderna">Moderna</option>
                            <option value="Janssen">Janssen</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="fecha_primer_dosis" class="form-control" placeholder="Fecha primera dosis (YYYY/MM/dd)">
                    </div>
                    <div class="form-group">
                        <select class="form-select" name="estado_vacunacion">
                            <option selected>Estado vacunacion...</option>
                            <option value="Protegido">Protegido</option>
                            <option value="En progreso">En progreso</option>
                            <option value="En riesgo">En riesgo</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar_vacuna" value="Guardar">
                </form>
            </div>
        </div>

        <div class="col-md-10">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Puesto Laboral</th>
                        <th>Vacuna Administrada</th>
                        <th>Fecha Primer Dosis</th>
                        <th>Fecha Segunda Dosis</th>
                        <th>Estado Vacunación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "EXEC UsuariosProc @StatementType = 'Select'";
                    $result = sqlsrv_query($conn, $query);

                    if (!$result) {
                        die(print_r(sqlsrv_errors(), true));
                    }

                    while($fila = sqlsrv_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td><?php echo $fila['puesto_laboral'] ?></td>
                            <td><?php echo $fila['vacuna_administrada'] ?></td>
                            <td><?php echo $fila['fecha_primer_dosis']->format('Y/m/d'); ?></td>
                            <td><?php echo $fila['fecha_segunda_dosis']->format('Y/m/d'); ?></td>
                            <td><?php echo $fila['estado_vacunacion'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $fila['id_usuario'] ?>" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                <a href="delete_vacuna.php?id=<?php echo $fila['id_usuario'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>