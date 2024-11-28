<?php 
error_reporting(E_ALL ^ E_WARNING);
ini_set('display_errors', 1) ;
if(!empty($_SESSION['unidade']) & $_SESSION['cargo']!="comum"){
    $_SESSION['id'];
    $_SESSION['usuario'];
    $_SESSION['unidade'];
    $_SESSION['nm_unidade'];
    $_SESSION['cargo'];
    include_once 'conect.php';
    include_once 'dialog.php';
}
else{
    header("?route=/unidades");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolut.On</title>
    <link rel="shortcut icon" type="imagex/png" href="\Reso\assets\img\logoresoluton.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Reso/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>