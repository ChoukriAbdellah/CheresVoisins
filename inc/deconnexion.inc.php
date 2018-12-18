<?php
session_start();

// on suprimme de la méoire la variable session 'user'
unset($_SESSION['user']);
unset($_SESSION['panier']);

// on redirige vers la page d'index
header("location:../index.php");