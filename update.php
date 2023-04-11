<?php

require_once('conexao.php');



if(isset($_GET['id']) && $_GET['id'] <> ''){

   $id = $_GET['id'];
   $sql = "SELECT * FROM conta WHERE id=:id";
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   $stmt->execute();

   $resultado = $stmt->fetch(PDO::FETCH_ASSOC);  
}
if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

$dados = array(
'id'   => $_POST['id'],
'nome' =>$_POST['nome'] ,
'data_nasc' => $_POST['data_nasc'],
'senha' => $_POST['senha'],
'email' =>$_POST['email'] ,
'cpf' => $_POST['cpf']
   );

   $sql = "UPDATE conta SET 
   nome=:nome,
   data_nasc=:data_nasc,
   senha=:senha,
   email=:email,
   cpf=:cpf 
   WHERE id=:id
"; 

$stmt = $pdo->prepare($sql);
   $stmt->bindParam(':nome', $dados['nome']);
   $stmt->bindParam(':data_nasc', $dados['data_nasc']);
   $stmt->bindParam(':senha', $dados['senha']);
   $stmt->bindParam(':email', $dados['email']);
   $stmt->bindParam(':cpf', $dados['cpf']);
   $stmt->bindParam(':id', $dados['id'], PDO::PARAM_INT);

   $stmt->execute();

   header('location: read.php');

}

// $dados = array(

// 'id'   => 2,
// 'nome' => 'Pessoa',
// 'data_nasc' => '15/02/2023',
// 'senha' => 'abc123',
// 'email' => 'pessoa@gmail.com',
// 'cpf' => '11111111-00'

// );

// $sql = "UPDATE conta SET 
//    nome=:nome,
//    data_nasc=:data_nasc,
//    senha=:senha,
//    email=:email,
//    cpf=:cpf 
//    WHERE id=:id
//    ";
   
//    $stmt = $pdo->prepare($sql);
//    $stmt->bindParam(':nome', $dados['nome']);
//    $stmt->bindParam(':data_nasc', $dados['data_nasc']);
//    $stmt->bindParam(':senha', $dados['senha']);
//    $stmt->bindParam(':email', $dados['email']);
//    $stmt->bindParam(':cpf', $dados['cpf']);
//    $stmt->bindParam(':id', $dados['id'], PDO::PARAM_INT);

//    $stmt->execute();

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

    <form action="update.php" method="POST" enctype="multipart/form-data">
        <div>
            <label>Nome: </label>
            <input type="text" name="nome" value="<?= $resultado['nome'];?>" placeholder="Digite seu nome">
        </div>
        <div>
            <label>Data de nascimento: </label>
            <input type="data" name="data_nasc" value="<?= $resultado['data_nasc'];?>" placeholder="Nasceu em...">
        </div>
        <div>
            <label>Senha: </label>
            <input type="password" name="senha" value="<?= $resultado['senha'];?>" placeholder="Digite a senha">
        </div>
        <div>
            <label>Email: </label>
            <input type="email" name="email" value="<?= $resultado['email'];?>" placeholder="Digite seu email">
        </div>
        <div>
            <label>CPF: </label>
            <input type="text" name="cpf" value="<?= $resultado['cpf'];?>" placeholder="Digite seu CPF">
        </div>
        <div>
            <input type="hidden" name="id" value="<?= $resultado['id'];?>">
            <input type="hidden" name="acao" value="cadastrar">
            <input type="submit" value="Editar conta">
        </div>
    </form>
   
</body>
</html>
