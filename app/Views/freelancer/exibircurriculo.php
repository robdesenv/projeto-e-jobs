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
                        <a class="nav-link" href="meucurriculo"><i class="fas fa-file-alt"></i> Meu currículo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="servicosprestados"><i class="fas fa-tasks"></i> Serviços prestados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transrecebidas"><i class="fa-dollar-sign"></i> Transferências
                            recebidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="telabusca"><i class="fas fa-search"></i> Buscar serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-logout" href="/projeto-e-jobs/public/index.php/logout"><i
                                class="fas fa-sign-out-alt"></i> Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="curriculo-section">
            <h1>Meu Currículo</h1>

            <div class="info-label">Nome:</div>

            <div class="info-label">Telefone:</div>


            <div class="info-label">E-mail:</div>


            <div class="info-label">Data de Nascimento:</div>


            <div class="info-label">Estado:</div>


            <div class="info-label">Cidade:</div>


            <div class="info-label">Formações:</div>

            <div class="info-label">Cargos:</div>


            <div class="text-center">
                <a href="meucurriculo" class="edit-btn"><i class="fas fa-edit"></i> Alterar Informações</a>
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