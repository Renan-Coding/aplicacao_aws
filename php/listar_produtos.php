<?php
require 'dbconnect.php';

try {
    $sql = "SELECT * FROM produtos ORDER BY produto_id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Erro ao listar produtos: " . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .btn { display: inline-block; padding: 10px 15px; background-color: #4CAF50; color: white; 
               text-decoration: none; border-radius: 4px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <a href="cadastrar_produto.php" class="btn">Cadastrar Novo Produto</a>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Data de Cadastro</th>
                <th>Disponível</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($result) > 0): ?>
                <?php foreach($result as $produto): ?>
                    <tr>
                        <td><?php echo $produto['produto_id']; ?></td>
                        <td><?php echo $produto['nome']; ?></td>
                        <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($produto['data_cadastro'])); ?></td>
                        <td><?php echo $produto['disponivel'] ? 'Sim' : 'Não'; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Nenhum produto cadastrado</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
