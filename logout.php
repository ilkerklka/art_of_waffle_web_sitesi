<?php
session_start();


if ($_SESSION['giris']) {
    session_destroy();
    header("Location:index.php");
}




if ($_SESSION['admin']) {
    session_destroy();
    header("Location:adminpanel/index.php");
}

?>