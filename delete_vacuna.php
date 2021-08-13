<?php 

include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM usuario WHERE id_usuario = $id";
    $result = sqlsrv_query($conn, $query);

    if (!$result) {
        die(print_r(sqlsrv_errors(), true));
    }

    $_SESSION['mensaje'] = 'Usuario eliminado';
    $_SESSION['tipo_mensaje'] = 'danger';

    header("Location: index.php");
}

?>