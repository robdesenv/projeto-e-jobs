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
            margin-bottom: 30px;
            text-align: center;
        }

        .filtros .form-group label {
            font-weight: bold;
            color: #333;
        }

        .filtros input,
        .filtros select {
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
            display: block;
            margin-top: 10px;
        }

        .filtros button:hover {
            background-color: #0a66c2;
        }

        .servicos-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .servico-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e0e0e0;
            padding: 20px;
        }

        .servico-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }

        .servico-card h3 {
            color: #004182;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .servico-card p {
            color: #333;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .btn-candidatar {
            background-color: #004182;
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-candidatar:hover {
            background-color: #0a66c2;
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
        }

        @media (max-width: 768px) {
            .servicos-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <?php include 'menuFreelancer.php'; ?>

    <div class="container">
        <div class="busca-section">
            <h1>Buscar Serviços</h1>

            <div class="filtros">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <select id="categoria" class="form-control">
                                <option value=""></option>
                                <?php foreach($cargos as $cargo): ?>
                                <option value="<?php echo $cargo['id']?>"><?php echo $cargo['cargo']?></option>
                                <?php endforeach;?>
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
                <button onclick="filtrarServicos()">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </div>

     
            <div class="servicos-container" id="listaServicos">
                <?php foreach ($eventos as $evento): ?>
                <div class="servico-card">
                    <h3><?php echo htmlspecialchars($evento['nome']); ?></h3>
                    <p><strong>Endereço:</strong> <?php echo htmlspecialchars($evento['endereco']); ?></p>
                    <p><strong>Cidade:</strong> <?php echo htmlspecialchars($evento['cidade']); ?></p>
                    <p><strong>Valor:</strong> R$ 200</p> 
                    <p><strong>Descrição:</strong> <?php echo htmlspecialchars($evento['descricao']); ?></p>
                    <button class="btn-candidatar" onclick="candidatarServico(<?php echo $evento['id']; ?>)">Candidatar-se</button>
                </div>
                <?php endforeach; ?>
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
