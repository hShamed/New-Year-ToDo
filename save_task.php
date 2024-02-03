<?php

include('db.php');

if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO objective(title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('QUERY FAILED');
    }

    header("Location: index.php");

} else {
    echo 'POST FAILED';
}

?>