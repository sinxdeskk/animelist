<?php
include('conexao.php');

if($mysqli->error) {
    die("Falha ao conectar ao MySQL: " .$mysqli->error);
}

if(isset($_POST['nickname']) || isset($_POST['password'])) {

    if(strlen($_POST['nickname']) == 0) {

        echo "Preencha o campo do nickname!";

    } else if(strlen($_POST['password']) == 0) {
        echo "Preencha o campo da senha!";
    }
} else {

    $nickname = $mysqli->real_escape_string($_POST['nickname']);
    $password = $mysqli->real_escape_string($_POST['password']);

    $sql_code = "SELECT * FROM users WHERE nickname = '$nickname' AND password = '$password'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " .$mysqli->error);

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1) { 

        $nickname = $sql_query->fetch_assoc();

        if(!isset($_SESSION)) {
            session_start();
        }

        echo  "<script>alert('Email enviado com Sucesso!');</script>"; //So para saber se a conexão funcionou
        

    } else {
        echo "username ou senha incorretos!";
    }

}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>

    <div class="main-login">

        <div class="topodacidade">

            <h1>Sobe pra nois</h1>
        </div>
        <div clas="right-login">
        <form action="" method="POST">
            <div class="card-login">
                <h1>Login</h1>
                    <div class="textfield">
                        <label for="nickname">Usuário</label>
                        <input type="text" name="nickname" placeholder="Usuário">
                    </div>
                    <div class="textfield">
                        <label for="password">Senha</label>
                        <input type="password" name="password" placeholder="Senha">
                    </div>
                    <button class="btn-login">Login</button>
                </form>
                
            </div>

        </div>

    </div>
    
</body>
</html>