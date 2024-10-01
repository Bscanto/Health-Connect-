<?php 
require_once("conexao.php");

$senha = $_POST['senha'];
$re_senha = $_POST['re_senha'];
$token = $_POST['token'];
$email = $_POST['email'];

$_SESSION['temp_reset_email'] = $_REQUEST['email'];
$_SESSION['temp_reset_token'] = $_REQUEST['token'];

if($senha != $re_senha){
     echo 'As senhas são diferentes!!';
     exit();
}

        $senha = sha1($senha);

          $query = $pdo->prepare("UPDATE usuarios SET senha_crip = :senha, token = :token WHERE email = '$email'");

               $query->bindValue(":senha", "$senha");
               $query->bindValue(":token", "$token");
               $query->execute();

        echo 'Senha alterada com Sucesso';


?>