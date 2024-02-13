<?php

include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
        
    $query = "DELETE FROM objective WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['message'] = 'El propósito se ha eliminado';
        $_SESSION['message_type'] = 'successMessage';
    } else {
        die('QUERY FAILED');
        $_SESSION['message'] = 'El propósito no se eliminó';
        $_SESSION['message_type'] = 'failMessage';
    }

    header("Location: index.php");

} else {
    $_SESSION['message'] = 'Ocurrió un Error';
    $_SESSION['message_type'] = 'failMessage';

    header("Location: index.php");
}

?>