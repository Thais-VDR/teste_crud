<?php
    require_once('conexao.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = 'DELETE FROM conta WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header('Location: read.php');
    }
