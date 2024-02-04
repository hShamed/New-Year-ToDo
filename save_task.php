<?php

include('db.php');

if (isset($_POST['save_task'])) {

    if ($_POST['title'] != "" && $_POST['description'] != "") {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "INSERT INTO objective(title, description) VALUES ('$title', '$description')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['message'] = 'El propósito se ha guardado';
            $_SESSION['message_type'] = 'successMessage';
        } else {
            die('QUERY FAILED');
            $_SESSION['message'] = 'El propósito no se guardó';
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