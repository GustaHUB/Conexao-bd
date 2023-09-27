<?php
require_once('conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM produtos WHERE id = :id";
    $stm = $db->prepare($query);
    $stm->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stm->execute()) {
        header('Location: listarProd.php');
    } else {
        echo "Erro ao excluir o produto.";
    }
} else {
    echo "ID do produto não especificado.";
}
?>