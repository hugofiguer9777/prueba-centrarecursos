<?php 

include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "EXEC UsuariosProc @id_usuario = '$id', @StatementType = 'Delete'";
    $result = sqlsrv_query($conn, $query);

    if (!$result) {
        die(print_r(sqlsrv_errors(), true));
    }

    $_SESSION['mensaje'] = 'Usuario eliminado';
    $_SESSION['tipo_mensaje'] = 'danger';

    header("Location: index.php");
}

?>