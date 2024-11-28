<?php
error_reporting(E_ALL ^ E_WARNING);
ini_set('display_errors', 1) ;
if(!empty($_SESSION['id'])){
    $_SESSION['id'];
    $_SESSION['usuario'];
    unset($_SESSION['conexao']);
    unset($_SESSION['cargo']);
    include_once 'conect.php';
    include_once 'dialog.php';
}
else{
    header("Location: ?route=/logout");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolut.On</title>
    <link rel="shortcut icon" type="imagex/png" href="../assets/img/logoresoluton.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="/Reso/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
