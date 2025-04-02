<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Serviços - Freelancer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .busca-section {
            padding: 50px 0;
            background-color: #ffffff;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .busca-section h1 {
            color: #004182;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .filtros {
            margin-bottom: 30px;
        }

        .filtros .form-group {
            margin-bottom: 15px;
        }

        .filtros label {
            font-weight: bold;
            color: #333;
        }

        .filtros input,
        .filtros select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .filtros button {
            background-color: #004182;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filtros button:hover {
            background-color: #0a66c2;
        }

        .servico-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }

        .servico-card h3 {
            color: #004182;
            margin-bottom: 10px;
        }

        .servico-card p {
            color: #333;
            margin-bottom: 5px;
        }

        .servico-card .btn-candidatar {
            background-color: #004182;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .servico-card .btn-candidatar:hover {
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
    <?php include 'menuContratante.php'; ?>

    <div class="container">
        <div class="busca-section">
            <h1>Buscar freelancer</h1>

            <!-- Filtros de Busca -->
            <div class="filtros">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <select id="categoria" class="form-control">
                                <option value="">Todas</option>
                                <option value="design">Garçom</option>
                                <option value="desenvolvimento">Motorista</option>
                                <option value="marketing">Copeiro</option>
                                <option value="consultoria">Segurança</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="localizacao">Localização:</label>
                            <input type="text" id="localizacao" class="form-control" placeholder="Digite a localização">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="filtrarServicos()">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </div>


            <div id="listafreelancer">
                <!-- exemplo dos Freelancer -->
                <div class="servico-card">
                    <h3>Motorista</h3>
                    <p><strong>Categoria:</strong> Motorista</p>
                    <p><strong>Localização:</strong> Viçosa, MG</p>
                    <button class="btn-candidatar" onclick="contratar(1)">Entrar em contato</button>
                </div>

                <div class="servico-card">
                    <h3>Garçom</h3>
                    <p><strong>Categoria:</strong> Garçom</p>
                    <p><strong>Localização:</strong> Viçosa, MG</p>
                    <button class="btn-candidatar" onclick="contratar(2)">Entrar em contato</button>
                </div>
            </div>
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

        function filtrarServicos() {
            const categoria = document.getElementById('categoria').value;
            const localizacao = document.getElementById('localizacao').value;
            const valor = document.getElementById('valor').value;

            alert(`Filtrando por: Categoria - ${categoria}, Localização - ${localizacao}, Valor Máximo - ${valor}`);

        }

        function candidatarServico(idServico) {
            alert(`Candidatando-se ao serviço ID: ${idServico}`);
        }
    </script>
</body>

</html>