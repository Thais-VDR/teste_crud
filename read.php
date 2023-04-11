<?php
   require_once('conexao.php');
   require_once('funcoes.php');
    $sql = "SELECT * FROM conta";

    $stmt = $pdo->prepare($sql);

   $stmt->execute();


   //while($resultado = $stmt->fetch()) {}
        //echo 'ID:' . $resultado['id'] . '<br>';
        //echo 'NOME:' . $resultado['nome'] . '<br>';
        //echo 'DATA NASCIMENTO:' . $resultado['data_nasc'] . '<br>';
        //echo 'SENHA:' . $resultado['senha'] . '<br>';
        //echo 'EMAIL: ' . $resultado['email'] . '<br>';
        //echo 'CPF: ' . $resultado['cpf'] . '<br><br><br>';
    //}

    //Buscando um único registro no banco de dados

   //echo'<hr>';
   //echo'<h1>Listando apenas 1 registro</h1>';

    //$id = 2;
   // $sql = "SELECT * FROM conta WHERE id=:id";
    //$stmt = $pdo->prepare($sql);
    //$stmt->bindParam(':id', $id, PDO::PARAM_INT);
    //$stmt->execute();

    //$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    //echo 'ID:' . $resultado['id'] .'<br>';
    //echo 'NOME:' . $resultado['nome'] .'<br>';
    //echo 'DATA NASCIMENTO:' . $resultado['data_nasc'] .'<br>';
    //echo 'SENHA:' . $resultado['senha'] .'<br>';
    //echo 'EMAIL:' . $resultado['email'] .'<br>';
    //echo 'CPF:' . $resultado['cpf'] .'<br><br><br>';

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

    <table border="1" cellspacing="0">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Data de nascimento</th>
            <th>E-mail</th>
            <th>CPF</th>
            <th colspan="2">Ações</th>
        </tr>
        </thead>
        <tbody>

        <?php
         while($resultado = $stmt->fetch()) {
        ?>
         <!--HTML DENTRO DO PHP-->
         <tr>
                <td><?= $resultado['id'];?></td>
                <td><?= $resultado['nome'];?></td>
                <td><?= $resultado['data_nasc'];?></td>
                <td><?= $resultado['email'];?></td>
                <td><?= $resultado['cpf'];?></td>
                <td><a href="update.php?id=<?= $resultado['id'];?>">Editar</a></td>
                <td><a href="delete.php?id=<?= $resultado['id'];?>">Excluir</a></td>
        </tr>

        <?php

         }
        ?>
        </tbody>
    </table>

</body>
</html>