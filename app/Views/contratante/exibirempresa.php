<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha empresa - Contratante</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .curriculo-section {
            padding: 50px 0;
            background-color: #ffffff;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .curriculo-section h1 {
            color: #004182;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .info-label {
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }

        .info-value {
            margin-bottom: 15px;
            padding: 8px;
            background-color: #f8f9fa;
            border-radius: 5px;
            border-left: 4px solid #004182;
        }

        .edit-btn {
            background-color: #004182;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            text-decoration: none;
            display: inline-block;
        }

        .edit-btn:hover {
            background-color: #0a66c2;
            color: #ffffff;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #004182;
            color: #ffffff;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <!-- chamando o Menu no arquivo menucontratante -->
    <?php include 'menuContratante.php'; ?>


    <div class="container">
        <div class="curriculo-section">
            <h1>Meus dados</h1>

            <?php foreach ($contratantes as $contratante): ?>
                <div class="info-label">Nome: <?php echo $contratante['nome'] ?></div>

                <div class="info-label">Telefone: <?php echo $contratante['telefone'] ?></div>


                <div class="info-label">E-mail: <?php echo $contratante['email'] ?></div>


                <div class="info-label">Data de Nascimento: <?php echo $contratante['data_nasc'] ?></div>


                <div class="info-label">Estado: <?php echo $contratante['estado'] ?> </div>


                <div class="info-label">Cidade: <?php echo $contratante['cidade'] ?> </div><br>

                <h1>Minha empresa</h1>

                <div class="info-label">Empresa: <?php echo $contratante['empresa'] ?> </div>

                
            <?php endforeach; ?>

            <div class="text-center">
                <a href="<?php echo base_url('contratante/editarinformacoes/' . $contratante['id']) ?>" class="edit-btn"><i
                        class="fas fa-edit"></i> Alterar Informações</a>
            </div>

        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 e-Jobs. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>