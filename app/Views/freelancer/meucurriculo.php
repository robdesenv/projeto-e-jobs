<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Currículo - Freelancer</title>

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

        .curriculo-section label {
            font-weight: bold;
            color: #333;
        }

        .curriculo-section input,
        .curriculo-section textarea,
        .curriculo-section input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .curriculo-section button {
            background-color: #004182;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .curriculo-section button:hover {
            background-color: #0a66c2;
        }

        .footer {
            text-align: center;
            padding: 20px;
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
        }
    </style>
</head>

<body>

    <!-- chamando o Menu no arquivo menuFreelancer -->
    <?php include 'menuFreelancer.php'; ?>

    <div class="container">
        <div class="curriculo-section">
            <h1>Meu Currículo</h1>

            <form method="post" id="curriculoForm">
                <div class="row">

                    <input type="hidden" name="id" value="<?php echo (isset($freelancer) ? $freelancer['id'] : '') ?>">

                    <div class="col-md-6">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome"
                            value="<?php echo (isset($freelancer) ? $freelancer['nome'] : '') ?>"
                            placeholder="Digite seu nome" required>
                    </div>
                    <div class="col-md-6">
                        <label for="telefone">Telefone:</label>
                        <input type="tel" id="telefone" name="telefone"
                            value="<?php echo (isset($freelancer) ? $freelancer['telefone'] : '') ?>"
                            placeholder="Digite seu telefone" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email"
                            value="<?php echo (isset($freelancer) ? $freelancer['email'] : '') ?>"
                            placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="col-md-6">
                        <label for="dataNascimento">Data de Nascimento:</label>
                        <input type="date" id="dataNasc" name="dataNasc"
                            value="<?php echo (isset($freelancer) ? $freelancer['dataNasc'] : '') ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="estado">Estado:</label>
                        <input type="text" id="estado" name="estado"
                            value="<?php echo (isset($freelancer) ? $freelancer['estado'] : '') ?>"
                            placeholder="Digite seu estado" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cidade">Cidade:</label>
                        <input type="text" id="cidade" name="cidade"
                            value="<?php echo (isset($freelancer) ? $freelancer['cidade'] : '') ?>"
                            placeholder="Digite sua cidade" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="formacoes">Formações:</label>
                        <textarea id="formacoes" name="formacoes" rows="4"
                            placeholder="Descreva suas formações"><?php echo (isset($freelancer) ? $freelancer['formacoes'] : '') ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit"><?php echo $acao ?></button>
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