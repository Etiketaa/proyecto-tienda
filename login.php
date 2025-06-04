<?php
$usuario = $_POST ['username'];
$password = $_POST ['password'];

$ckuser = "admin";
$ckpass = 1234;

if ($usuario == $ckuser && $password == $ckpass) {
    header ("location:listar.php"); } 
else {
    header ("location:error.html");
}   

?> 