<?php
    $password = "Ab123+";

    $pass_cifrado = password_hash($password, PASSWORD_DEFAULT);

    echo "Password: " . $pass_cifrado;
?>