<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Empresa - e-Jobs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .empresa-section {
            background-color: #ffffff;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .empresa-section h1 {
            color: #004182;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }

        .empresa-section label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        .empresa-section input,
        .empresa-section textarea,
        .empresa-section select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .empresa-section input:focus,
        .empresa-section textarea:focus {
            border-color: #004182;
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 65, 130, 0.2);
        }

        .btn-enviar {
            background-color: #004182;
            color: #ffffff;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 16px;
            margin-top: 10px;
            display: inline-block;
        }

        .btn-enviar:hover {
            background-color: #0a66c2;
            transform: translateY(-2px);
        }

        .footer {
            text-align: center;
            padding: 25px;
            background-color: #004182;
            color: #ffffff;
            margin-top: 40px;
        }

        .footer a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #cce4ff;
            text-decoration: underline;
        }

        
    </style>
</head>

<body>
    <?php include 'menuContratante.php'; ?>

    <div class="container">
        <div class="empresa-section">
            <h1>Meus dados</h1>
            <form method="post" id="empresaForm">

                <input type="hidden" name="id" value="<?php echo isset($contratante) ? $contratante['id'] : "" ?>">

                <div class="row">
                    <div class="col-md-6">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome"
                            value="<?php echo isset($contratante) ? $contratante['nome'] : "" ?>"
                            placeholder="Digite seu nome completo" required>
                    </div>
                    <div class="col-md-6">
                        <label for="telefone">Telefone:</label>
                        <input type="tel" id="telefone" name="telefone"
                            value="<?php echo isset($contratante) ? $contratante['telefone'] : "" ?>"
                            placeholder="(00) 00000-0000" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email"
                            value="<?php echo isset($contratante) ? $contratante['email'] : "" ?>"
                            placeholder="seu@email.com" required>
                    </div>
                    <div class="col-md-6">
                        <label for="data_nasc">Data de Nascimento:</label>
                        <input type="date" id="data_nasc" name="data_nasc"
                            value="<?php echo isset($contratante) ? $contratante['data_nasc'] : "" ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="estado">Estado:</label>
                        <input type="text" id="estado" name="estado"
                            value="<?php echo isset($contratante) ? $contratante['estado'] : "" ?>"
                            placeholder="Seu estado" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cidade">Cidade:</label>
                        <input type="text" id="cidade" name="cidade"
                            value="<?php echo isset($contratante) ? $contratante['cidade'] : "" ?>"
                            placeholder="Sua cidade" required>
                    </div>
                </div>

                <h1><i class="fas fa-building me-2"></i>Minha Empresa</h1>

                <div class="row">
                    <div class="col-md-12">
                        <label for="empresa">Sobre a Empresa:</label>
                        <textarea id="empresa" name="empresa" rows="5"
                            placeholder="Descreva sua empresa e os serviços que oferece"
                            required><?php echo isset($contratante) ? $contratante['empresa'] : "" ?></textarea>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn-enviar">Atualizar dados
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 e-Jobs. Todos os direitos reservados.</p>
            <p><a href="#">Política de Privacidade</a> | <a href="#">Termos de Uso</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>