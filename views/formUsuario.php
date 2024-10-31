<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Catálogo de Produtos</title>
</head>
<body>
    <h1>Sistema de Catálogo - Usuários</h1>
    <a href="usuarios.php">Voltar</a>
    <form action="salvarUsuario.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
        <input type="text" name="login" value="<?php echo $usuario->getLogin(); ?>" placeholder="LOGIN:">
        <br>
        <input type="password" name="senha" placeholder="Senha:">
        <br>
        <?php
            if(!empty($usuario->getId())){
        ?>
        <span>Para deixar a senha atual, basta deixar o campo em branco!</span>
        <?php
            }
        ?>
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>