<?php
require_once('conexao.php');

$query = "SELECT * FROM produtos";
$stm = $db->query($query);
$produtos = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Produtos</title>
</head>

    <style>

    th {
        background-color: #ccc;
    }
    a {
        text-decoration: none;
    }

    </style>

<body>
    <h1>Listagem de Produtos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Unidade de Medida</th>
            <th>Ação</th>
        </tr>
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?php echo $produto['id']; ?></td>
                <td><?php echo $produto['descricao']; ?></td>
                <td><?php echo $produto['un_medida']; ?></td>
                <td><a href="excluirProd.php?id=<?php echo $produto['id']; ?> "
                onclick="return confirm('Confirma a exclusão?');"
                >Excluir</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="cadastrarProd.php">Cadastrar Produto</a>
</body>
</html>