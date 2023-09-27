<?php
//session_start();
if (!isset($_POST['submit'])){
    $_SESSION['msg'] = "Você deve efetuar login para acessar o site";
    header("Location:login.php");
}


?>