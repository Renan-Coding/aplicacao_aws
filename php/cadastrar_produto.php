<?php
require 'dbconnect.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $data_cadastro = $_POST['data_cadastro'];
        $disponivel = isset($_POST['disponivel']) ? 'true' : 'false';
        
        $sql = "INSERT INTO produtos (nome, preco, data_cadastro, disponivel) 
                VALUES (:nome, :preco, :data_cadastro, :disponivel)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':data_cadastro', $data_cadastro);
        $stmt->bindParam(':disponivel', $disponivel);
        
        $stmt->execute();
        
        $mensagem = "Produto cadastrado com sucesso!";
    } catch(PDOException $e) {
        $mensagem = "Erro ao cadastrar produto: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        form { max-width: 500px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="number"], input[type="date"] { 
            width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; 
        }
        .checkbox-group { display: flex; align-items: center; }
        .checkbox-group input { margin-right: 10px; }
        button { padding: 10px 15px; background-color: #4CAF50; color: white; 
                border: none; border-radius: 4px; cursor: pointer; }
        .message { padding: 10px; margin-bottom: 20px; border-radius: 4px; }
        .success { background-color: #dff0d8; color: #3c763d; }
        .error { background-color: #f2dede; color: #a94442; }
        .btn-link { display: inline-block; margin-top: 20px; color: #337ab7; text-decoration: none; }
    </style>
</head>
<body>
    <h1>Cadastrar Novo Produto</h1>
    
    <?php if ($mensagem): ?>
        <div class="message <?php echo strpos($mensagem, 'sucesso') !== false ? 'success' : 'error'; ?>">
            <?php echo $mensagem; ?>
        </div>
    <?php endif; ?>
    
    <form method="POST" action="">
        <div class="form-group">
            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        
        <div class="form-group">
            <label for="preco">Preço (R$):</label>
            <input type="number" id="preco" name="preco" step="0.01" min="0" required>
        </div>
        
        <div class="form-group">
            <label for="data_cadastro">Data de Cadastro:</label>
            <input type="date" id="data_cadastro" name="data_cadastro" required>
        </div>
        
        <div class="form-group checkbox-group">
            <input type="checkbox" id="disponivel" name="disponivel" checked>
            <label for="disponivel">Produto Disponível</label>
        </div>
        
        <button type="submit">Cadastrar Produto</button>
    </form>
    
    <a href="listar_produtos.php" class="btn-link">Voltar para a Lista de Produtos</a>
</body>
</html>
