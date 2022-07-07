<?php
$usuario = 'root';
$senha = '';
$database = 'animelist';
$host = 'localhost';

$conexao = mysqli_connect($host, $usuario, $senha, $database) or die ("Não foi possivel fazer a conexão ao MySQL");


