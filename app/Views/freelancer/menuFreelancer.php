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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(relativePath: 'freelancer/index') ?>">e-Jobs</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('freelancer/index') ?>"><i
                                class="fas fa-file-alt"></i> Inicio </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('freelancer/meucurriculo') ?>"><i
                                class="fas fa-file-alt"></i> Meu
                            currículo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('freelancer/servicosprestados') ?>"><i
                                class="fas fa-tasks"></i>
                            Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('freelancer/transrecebidas') ?>"><i
                                class="fa-dollar-sign"></i>
                            Transferências recebidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('freelancer/telabusca') ?>"><i
                                class="fas fa-search"></i> Buscar
                            serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-logout" href="<?php echo base_url('logout') ?>"><i
                                class="fas fa-sign-out-alt"></i> Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>



</html>