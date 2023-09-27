<?php
require_once('conexao.php');

if (isset($_GET['descricao']) && isset($_GET['un_medida'])) {
    $descricao = $_GET['descricao'];
    $un_medida = $_GET['un_medida'];

    $query = "INSERT INTO produtos (descricao, un_medida) VALUES (:descricao, :un_medida)";
    $stm = $db->prepare($query);
    $stm->bindParam(':descricao', $descricao, PDO::PARAM_STR);
    $stm->bindParam(':un_medida', $un_medida, PDO::PARAM_STR);

    if ($stm->execute()) {
        header('Location: listarProd.php');
    } else {
        echo "Erro ao cadastrar o produto.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Produto</title>
</head>
    <style>
        
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        form label {
            font-weight: bold;
            font-size: 15px;
        }
        form a {
            margin-top: 10px;
            display: flex;
            justify-content: center;
        }
        .btn {
            background-color: #1a8;
            color: #fff;
            text-align: center;
            cursor: pointer;
            border-radius: 10px;
            width: 110px;
            font-weight: bold;
            border: none;
            padding: 10px 15px;
            font-size: 1em;
        }
        input, 
        textarea {
            box-sizing: border-box; 
            border: none;
            border-bottom: 1px solid #ccc; 
            padding: .8em 0;
            background-color: transparent;
        }
        input:focus {
            outline: none;
        }

    </style>
<body>
    <form action="cadastrarProd.php" method="GET">
        <h1>Cadastrar Produto</h1>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" placeholder="Descrição do produto" required>
        <br>
        <label for="un_medida">Unidade de Medida:</label>
        <input type="text" name="un_medida" placeholder="Digite a unidade de medida" required>
        <br>
        <input class="btn" type="submit" value="Cadastrar">
        <a href="listarProd.php">Lista de produtos</a>
    </form>
</body>
</html>