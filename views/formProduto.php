<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Acadêmico</title>
</head>
<body>
    <?php include("includes/menu.php"); ?>
    <h1>Sistema Acadêmico - Cadastro de Aluno</h1>
    <a href="produtos.php">Voltar para a listagem</a>
    <form action="salvarProduto.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $produto->getId(); ?>">
        <input type="text" name="nome" value="<?php echo $produto->getNome(); ?>" placeholder="Nome:">
        <br>
        <input type="text" name="matricula" value="<?php echo $aluno->getMatricula(); ?>" placeholder="Matrícula:">
        <br>
        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto">
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>