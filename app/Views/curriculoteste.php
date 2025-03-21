<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?></title>
</head>
<body>
    <?php echo $msg ?>
    <form method="post">
        <label for="">nome: </label>
        <input type="text" name="nome"> <br>
        <label for="">telefone</label>
        <input type="text" name="telefone"><br>
        <label for="">email</label>
        <input type="text" name="email"><br>
        <label for="">data_nasc</label>
        <input type="date" name="dataNasc"><br>
        <label for="">estado</label>
        <input type="text" name="estado"><br>
        <label for="">cidade</label>
        <input type="text" name="cidade"><br>
        <label for="">formacoes</label>
        <input type="text" name="formacoes"><br>
        <label for="">cargos</label>
        <input type="text" name="cargos"><br>
        <input type="submit" value="enviar">
    </form>
</body>
</html>