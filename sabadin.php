<?php
include('conexao.php');





if(empty($_POST['nickname']) || empty($_POST['password'])) {
    
    

    header("Location: login.php");
    exit;

    
} 


    $nickname = mysqli_real_escape_string($conexao, $_POST['nickname']);
    $password = mysqli_real_escape_string($conexao, $_POST['password']);

    $query = "SELECT * FROM users WHERE nickname = '{$nickname}' AND password = '{$password}'";
    $result = mysqli_query($conexao, $query);

    $row = mysqli_num_rows($result);

    if($row == 1) {
        $_SESSION['nickname'] = $nickname;
        header("Location: inicio.php");
        exit();
    } else {
        echo '<script>alert("Senha Incorreta!")</script>';
    }

    exit;

