<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_new_year'
);

/*
if (isset($conn)) {
    echo 'DB CONNECTED';
}
*/