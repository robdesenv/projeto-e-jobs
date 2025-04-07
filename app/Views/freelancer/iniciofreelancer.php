<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - Freelancer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #004182;
            --primary-light: #e6f0fa;
            --secondary: #0a66c2;
            --accent: #25D366;
            --light: #f8f9fa;
            --dark: #212529;
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background-color: #f5f7fa;
            color: var(--dark);
        }

        .dashboard-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
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

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .welcome-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
        }

        .welcome-title {
            color: var(--primary);
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
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
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
            color: var(--primary);
            margin-bottom: 15px;
        }

        .action-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            margin-top: auto;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .action-btn:hover {
            background-color: var(--secondary);
            color: white;
        }

        .footer {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
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
        }
    </style>
</head>

<body>

    <?php include 'menuFreelancer.php'; ?>
    <!-- Cabeçalho do Dashboard -->
    <div class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2 text-center text-md-start mb-3 mb-md-0">
                    <img src="https://ui-avatars.com/api/?name=<?php echo isset($freelancer['nome']) ? urlencode($freelancer['nome']) : 'Freelancer' ?>&background=004182&color=fff&size=200"
                        alt="Avatar" class="profile-avatar">
                </div>
                <div class="col-md-10">
                    <h1 class="text-white mb-2">Olá,
                        <?php echo isset($freelancer['nome']) ? htmlspecialchars($freelancer['nome']) : 'Freelancer' ?>!
                    </h1>
                    <p class="text-white-50 mb-0">Bem-vindo ao seu painel de controle</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Cartão de Boas-vindas -->
        <div class="welcome-card">
            <h2 class="welcome-title">Seu Dashboard</h2>
            <p class="welcome-subtitle">Gerencie seus serviços, currículo e finanças de forma fácil e eficiente.</p>
        </div>

        <!-- Ações Rápidas -->
        <h2 class="welcome-title mt-5 mb-4"><i class="fas fa-bolt"></i> Ações Rápidas</h2>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3>Meu Currículo</h3>
                    <p>Atualize suas informações profissionais e habilidades</p>
                    <a href="<?php echo base_url('freelancer/meucurriculo') ?>" class="action-btn">Acessar</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Buscar Serviços</h3>
                    <p>Encontre novas oportunidades de trabalho</p>
                    <a href="<?php echo base_url('freelancer/telabusca') ?>" class="action-btn">Buscar</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <h3>Transferências</h3>
                    <p>Visualize seu histórico de pagamentos</p>
                    <a href="<?php echo base_url('freelancer/transrecebidas') ?>" class="action-btn">Verificar</a>
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