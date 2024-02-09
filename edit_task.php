<?php

include('db.php');

if (isset($_POST['edit_task'])) {

    if ($_POST['id'] != "" && $_POST['title'] != "" && $_POST['description'] != "") {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "UPDATE objective SET title = '$title', description = '$description' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['message'] = 'El propósito se ha editado correctamente';
            $_SESSION['message_type'] = 'successMessage';
        } else {
            die('QUERY FAILED');
            $_SESSION['message'] = 'El propósito no se logró editar';
            $_SESSION['message_type'] = 'failMessage';
        }
    } else {
        $_SESSION['message'] = 'Rellene todos los campos';
        $_SESSION['message_type'] = 'failMessage';
    }

    header("Location: index.php");

} else {
    $_SESSION['message'] = 'Ocurrió un Error';
    $_SESSION['message_type'] = 'failMessage';

    header("Location: index.php");
}

?>