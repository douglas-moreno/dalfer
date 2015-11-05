<?php
    include_once '../functions.php';
    isLoggedIn();
    
    echo $_SESSION["usuario"] . "<br>";
    echo $_SESSION["acesso"] . "<br>";
?>