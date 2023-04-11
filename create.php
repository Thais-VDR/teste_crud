<?php

//Primeira coisa a se fazer
//Chamar a conexao com o banco de dados


// include once: mostra o erro
// require once: mostra o erro fatal
//rowCount: quantas linhas foi alteradas no banco de dados

   
require_once('conexao.php');
require_once('funcoes.php');

if(isset($_POST['acao']) && $_POST['acao'] == 'cadastrar'){
 //dd($_POST);
 
 $dados = array(
    'nome'      =>     $_POST['nome'],
    'data_nasc' =>     $_POST['data_nasc'],
    'senha'     =>     $_POST['senha'],
    'email'     =>     $_POST['email'],
    'cpf'       =>     $_POST['cpf']
  );
      
$sql = "INSERT INTO conta (
nome, data_nasc, senha, email, cpf) VALUES (
:nome, :data_nasc, :senha, :email, :cpf)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $dados['nome']);
$stmt->bindParam(':data_nasc', $dados['data_nasc']);
$stmt->bindParam(':senha', $dados['senha']);
$stmt->bindParam(':email', $dados['email']);
$stmt->bindParam(':cpf', $dados['cpf']);

$stmt->execute();

header('location: read.php');

}

//SQL que será usado para inserir no banco (INSERT)

//     //estes dados serão inseridos no banco

//     echo('foi inserido ' . $stmt->rowCount() . 
//         ' registro no banco de dados');
//     echo '<br>';
//     echo('Último Id inserido no banco: ' . $pdo->lastInsertId());


// 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar nova conta</title>
</head>
<body>
    <h1>BEM VINDO AO NOSSO BANCO - NS</h1>
    <a href="index.php">Página Inicial</a>
    <hr>

    <form action="create.php" method="POST" enctype="multipart/form-data">
        <div>
            <label>Nome: </label>
            <input type="text" name="nome" placeholder="Digite seu nome">
        </div>
        <div>
            <label>Data de nascimento: </label>
            <input type="data" name="data_nasc" placeholder="Nasceu em...">
        </div>
        <div>
            <label>Senha: </label>
            <input type="password" name="senha" placeholder="Digite a senha">
        </div>
        <div>
            <label>Email: </label>
            <input type="email" name="email" placeholder="Digite seu email">
        </div>
        <div>
            <label>CPF: </label>
            <input type="text" name="cpf" placeholder="Digite seu CPF">
        </div>
        <div>
            <input type="hidden" name="acao" value="cadastrar">
            <input type="submit" value="Cadastrar conta">
        </div>
    </form>
   
</body>
</html>