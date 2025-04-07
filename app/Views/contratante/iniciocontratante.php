<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Contratante</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #004182;
            --secondary-color: #0a66c2;
            --accent-color: #25D366;
            --light-bg: #f8f9fa;
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            color: #333;
            line-height: 1.6;
        }

        .dashboard-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 60px 0 40px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .dashboard-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(30%, -30%);
        }

        .welcome-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            padding: 30px;
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .welcome-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 10px;
        }

        .welcome-subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .action-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .action-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        /* Estilo dos botões igual ao da tela de busca */
        .action-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 15px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }

        .action-btn:hover {
            background-color: var(--secondary-color);
            color: white;
        }

        .action-btn i {
            margin-right: 8px;
        }

        .footer {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 30px 0;
            margin-top: 50px;
        }

        @media (max-width: 768px) {
            .dashboard-header {
                padding: 40px 0 30px;
            }
            
            .profile-avatar {
                width: 80px;
                height: 80px;
            }
            
            .welcome-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <?php include 'menuContratante.php'; ?>

    <div class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2 text-center text-md-start mb-3 mb-md-0">
                    <img src="https://ui-avatars.com/api/?name=<?php echo isset($contratante['nome']) ? urlencode($contratante['nome']) : 'Contratante' ?>&background=004182&color=fff&size=200" 
                         alt="Avatar" class="profile-avatar">
                </div>
                <div class="col-md-10">
                    <h1 class="text-white mb-2">Olá, <?php echo isset($contratante['nome']) ? htmlspecialchars($contratante['nome']) : 'Contratante' ?>!</h1>
                    <p class="text-white-50 mb-0">Bem-vindo ao seu painel de controle</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="welcome-card">
            <h2 class="welcome-title">Seu Dashboard</h2>
            <p class="welcome-subtitle">Gerencie seus eventos, freelancers e pagamentos de forma fácil e eficiente.</p>
        </div>

        <h2 class="welcome-title mt-5 mb-4"><i class="fas fa-bolt"></i> Ações Rápidas</h2>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                    <h3>Criar Evento</h3>
                    <p>Cadastre um novo evento</p>
                    <a href="contratante/vagaspub" class="action-btn">
                        <i class="fas fa-plus"></i> Criar
                    </a>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Buscar Freelancers</h3>
                    <p>Encontre profissionais qualificados para seu evento</p>
                    <a href="contratante/busca" class="action-btn">
                        <i class="fas fa-search"></i> Buscar
                    </a>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h3>Pagamentos</h3>
                    <p>Gerencie todos os seus pagamentos e transações</p>
                    <a href="contratante/pagamentos" class="action-btn">
                        <i class="fas fa-dollar-sign"></i> Acessar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2025 e-Jobs. Todos os direitos reservados.</p>
            <p class="mb-0">
                <a href="#" class="mx-2 text-white">Política de Privacidade</a> | 
                <a href="#" class="mx-2 text-white">Termos de Uso</a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>