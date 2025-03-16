<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Jobs - Conectando Talentos e Oportunidades</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #000000, #0a66c2);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #ffffff;
        }
        .presentation-container {
            text-align: center;
            background-color: rgba(51, 8, 168, 0.7);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
            max-width: 800px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .presentation-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.7);
        }
        .presentation-container h1 {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 48px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .presentation-container p {
            font-size: 20px;
            color: #ffffff;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        .btn-login {
            background-color: #0a66c2;
            border: none;
            padding: 15px 30px;
            font-size: 20px;
            border-radius: 8px;
            color: #ffffff;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        .btn-login:hover {
            background-color: #004182;
            transform: scale(1.05);
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            color: rgba(255, 255, 255, 0.8);
        }
        .footer a {
            color: #0a66c2;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer a:hover {
            text-decoration: underline;
            color: #004182;
        }
    </style>
</head>
<body>
    <div class="presentation-container">
        <h1>Bem-vindo ao e-Jobs</h1>
        <p>
            Conectamos talentos e oportunidades de forma simples e eficiente. Seja você um freelancer em busca de serviços ou uma empresa procurando profissionais qualificados, o e-Jobs é a plataforma ideal para você.
        </p>

        <a href="Login" class="btn-login">
            <i class="fas fa-sign-in-alt"></i> Fazer Login
        </a>
        <div class="footer">
            <p>&copy; 2025 e-Jobs. Todos os direitos reservados.</p>
            <p><a href="#">Política de Privacidade</a> | <a href="#">Termos de Uso</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>