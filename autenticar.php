<?php 
@session_start();
require_once("conexao.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$senha_crip = sha1($senha);

$query = $pdo->prepare("SELECT * from usuarios where email = :email and senha_crip = :senha");
$query->bindValue(":email", "$usuario");
$query->bindValue(":senha", "$senha_crip");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($res);

if($linhas > 0){

    if($res[0]['ativo'] != 'Sim'){
        echo '<script>window.alert("Seu acesso foi desativado!!")</script>'; 
        echo '<script>window.location="index.php"</script>';
        exit();
    }

    // Definir as variáveis de sessão
    $_SESSION['nome'] = $res[0]['nome'];
    $_SESSION['id'] = $res[0]['id'];
    $_SESSION['nivel'] = $res[0]['nivel'];

    // Verificar o nível de acesso e redirecionar
    if($res[0]['nivel'] == 'Administrador' or $res[0]['nivel'] == 'Diretor'){
        echo '<script>window.location="painel"</script>';

    } elseif($res[0]['nivel'] == 'Profissional'){
        echo '<script>window.location="painel-profissional"</script>';
				
    } else {
        echo '<script>window.alert("Nível de acesso desconhecido!")</script>';
        echo '<script>window.location="index.php"</script>';
    }

} else {
    echo '<script>window.alert("Dados Incorretos!!")</script>'; 
    echo '<script>window.location="index.php"</script>';  
}

?>