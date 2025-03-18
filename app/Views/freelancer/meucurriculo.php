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

        .navbar {
            background-color: #004182;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
            color: #ffffff;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            font-size: 16px;
            margin-right: 20px;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #0a66c2;
        }

        .curriculo-section {
            padding: 50px 0;
            background-color: #ffffff;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index">e-Jobs</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="meucurriculo"><i class="fas fa-file-alt"></i> Meu
                            currículo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="servicosprestados"><i class="fas fa-tasks"></i> Serviços
                            prestados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transrecebidas"><i class="fa-dollar-sign"></i>
                            Transferências recebidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="telabusca"><i class="fas fa-search"></i> Buscar
                            serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-logout" href="/projeto-e-jobs/public/index.php/logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="curriculo-section">
            <h1>Meu Currículo</h1>
            <form id="curriculoForm" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
                    </div>
                    <div class="col-md-6">
                        <label for="telefone">Telefone:</label>
                        <input type="tel" id="telefone" name="telefone" placeholder="Digite seu telefone" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>
                    <div class="col-md-6">
                        <label for="dataNascimento">Data de Nascimento:</label>
                        <input type="date" id="dataNascimento" name="dataNascimento" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="estado">Estado:</label>
                        <input type="text" id="estado" name="estado" placeholder="Digite seu estado" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cidade">Cidade:</label>
                        <input type="text" id="cidade" name="cidade" placeholder="Digite sua cidade" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="formacoes">Formações:</label>
                        <textarea id="formacoes" name="formacoes" rows="4" placeholder="Descreva suas formações" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="cargos">Cargos:</label>
                        <textarea id="cargos" name="cargos" rows="4" placeholder="Descreva seus cargos" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="curriculoPdf">Anexar Currículo (PDF):</label>
                        <input type="file" id="curriculoPdf" name="curriculoPdf" accept="application/pdf" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit">Salvar Alterações</button>
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
    <script>
        // Simulação de salvamento dos dados (pode ser substituído por uma requisição AJAX para o backend)
        document.getElementById('curriculoForm').addEventListener('submit', function (event) {
            event.preventDefault();

            // Verifica se um arquivo PDF foi selecionado
            const arquivoPdf = document.getElementById('curriculoPdf').files[0];
            if (arquivoPdf && arquivoPdf.type === 'application/pdf') {
                alert('Dados e currículo salvos com sucesso!');
                // Aqui você pode adicionar uma requisição AJAX para enviar os dados e o arquivo ao servidor
            } else {
                alert('Por favor, anexe um arquivo PDF válido.');
            }
        });
    </script>
</body>

</html>