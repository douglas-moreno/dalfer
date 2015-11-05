<?php
    session_start();
    function estaLogado() {
        if (!isset($_SESSION["usuario"])) {
            header("Location: index.php");
            exit;
        }
    }
    
    function isLoggedIn()
	{
		if($_SESSION['LoggedIn'])
		{
			return true;
		}
		else return false;
	}
    
?>