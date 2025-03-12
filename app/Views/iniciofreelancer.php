<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - Freelancer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #0a66c2;
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
            color: #cce4ff;
        }

        .welcome-section {
            padding: 50px 0;
            background-color: #ffffff;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .welcome-section h1 {
            color: #0a66c2;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .welcome-section p {
            font-size: 18px;
            color: #333;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #0a66c2;
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
    <!-- Barra de Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/iniciofreelancer">e-Jobs</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/freelancer/meu-curriculo"><i class="fas fa-file-alt"></i> Meu
                            currículo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/freelancer/servicos-prestados"><i class="fas fa-tasks"></i> Serviços
                            prestados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/freelancer/transferencias-recebidas"><i class="fa-dollar-sign"></i>
                            Transferências recebidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/freelancer/buscar-servicos"><i class="fas fa-search"></i> Buscar
                            serviços</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Mensagem de inicio se quiser -->
    <div class="container">
        <div class="welcome-section text-center">
            <!-- comentei pq tava dando erro, quando tiver pronto tem que colocar pra puxar o nome do usuario, colocar  <> <h1>Bem-vindo, ?= $user_name ?!</h1> -->
            <p>Gerencie seu currículo, serviços e finanças de forma fácil e eficiente.</p>
        </div>
    </div>

    <!-- Rodapé qualquer coisa muda, ou coloca informação de contato etc-->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 e-Jobs. Todos os direitos reservados.</p>
            <p><a href="#">Política de Privacidade</a> | <a href="#">Termos de Uso</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>