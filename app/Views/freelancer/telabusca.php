<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Serviços - Freelancer</title>

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
            --disabled: #6c757d;
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background-color: #f5f7fa;
            color: var(--dark);
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
            color: var(--primary);
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
            width: 100%;
        }

        .filtros button {
            background-color: var(--primary);
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
            background-color: var(--secondary);
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
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .servico-card p {
            color: #333;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .btn-candidatar {
            background-color: var(--primary);
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-candidatar:hover {
            background-color: var(--secondary);
        }

        .btn-candidatar.disabled {
            background-color: var(--disabled);
            cursor: not-allowed;
            opacity: 1;
        }

        .footer {
            text-align: center;
            padding: 25px;
            background-color: var(--primary);
            color: #ffffff;
            margin-top: 40px;
        }

        .alert-message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            text-align: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .data-destaque {
            background-color: var(--primary-light);
            padding: 10px;
            border-radius: 6px;
            text-align: center;
            margin-bottom: 15px;
        }

        .data-dia {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--primary);
            line-height: 1;
        }

        .data-mes {
            font-size: 1rem;
            color: #666;
            text-transform: uppercase;
        }

        .data-ano {
            font-size: 0.9rem;
            color: #888;
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

        <div id="msg" class="alert-message" style="display: none;"></div>

        <div class="filtros">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="categoria">Categoria:</label>
                        <select id="categoria" class="form-control">
                            <option value="">Todas categorias</option>
                            <?php foreach($cargos as $cargo): ?>
                            <option value="<?php echo $cargo['id']?>"><?php echo $cargo['cargo']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="localizacao">Localização:</label>
                        <input type="text" id="localizacao" class="form-control" placeholder="Digite a cidade ou estado">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button onclick="filtrarServicos()" class="btn btn-primary">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="servicos-container" id="listaServicos">
            <?php foreach ($vagas as $vaga): 
                $dataEvento = new DateTime($vaga['data']);
                $jaCandidatou = isset($candidaturas) ? in_array($vaga['id'], array_column($candidaturas, 'vaga_id')) : false;
            ?>
            <div class="servico-card" 
                 data-categoria="<?php echo $vaga['cargo_id']; ?>" 
                 data-localizacao="<?php echo strtolower($vaga['cidade']); ?>"
                 data-vaga-id="<?php echo $vaga['id']; ?>">
                
                <div class="data-destaque">
                    <div class="data-dia"><?php echo $dataEvento->format('d'); ?></div>
                    <div class="data-mes"><?php echo $dataEvento->format('M'); ?></div>
                    <div class="data-ano"><?php echo $dataEvento->format('Y'); ?></div>
                </div>
                
                <h3><?php echo htmlspecialchars($vaga['cargo']); ?></h3>
                <p><strong>Evento:</strong> <?php echo htmlspecialchars($vaga['nome']); ?></p>
                <p><strong>Endereço:</strong> <?php echo htmlspecialchars($vaga['endereco']); ?></p>
                <p><strong>Cidade:</strong> <?php echo htmlspecialchars($vaga['cidade']); ?></p>
                <p><strong>Estado:</strong> <?php echo htmlspecialchars($vaga['estado']); ?></p>
                <p><strong>Valor:</strong> R$ <?php echo number_format($vaga['valor'], 2, ',', '.'); ?></p> 
                <p><strong>Descrição:</strong> <?php echo htmlspecialchars($vaga['descricao']); ?></p>
                <button class="btn-candidatar <?php echo $jaCandidatou ? 'disabled' : ''; ?>" 
                        onclick="<?php echo $jaCandidatou ? '' : 'candidatarServico('.$vaga['id'].','.$vaga['evento_id'].', this)'; ?>" 
                        <?php echo $jaCandidatou ? 'disabled' : ''; ?>>
                    <i class="fas <?php echo $jaCandidatou ? 'fa-check' : 'fa-paper-plane'; ?>"></i> 
                    <?php echo $jaCandidatou ? 'Candidatura enviada' : 'Candidatar-se'; ?>
                </button>
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
    // Função para inicializar as candidaturas do localStorage 
    function inicializarCandidaturas() {
        const candidaturasLocalStorage = JSON.parse(localStorage.getItem('candidaturas')) || [];
        
        document.querySelectorAll('.servico-card').forEach(card => {
            const vagaId = parseInt(card.getAttribute('data-vaga-id'));
            const btn = card.querySelector('.btn-candidatar');
            
           
            const jaCandidatouServidor = btn.classList.contains('disabled');
            
           
            if (!jaCandidatouServidor && candidaturasLocalStorage.includes(vagaId)) {
                btn.innerHTML = '<i class="fas fa-check"></i> Candidatura enviada';
                btn.classList.add('disabled');
                btn.disabled = true;
            }
        });
    }

    async function candidatarServico(idVaga, idEvento, btnElement) {
        const btn = btnElement;
        
        if (btn.classList.contains('disabled')) return;

        try {
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
            btn.disabled = true;

            const response = await fetch('<?php echo base_url("freelancer/candidatarvaga?idVaga="); ?>' + idVaga + "&idEvento=" + idEvento);
            const data = await response.json();

            const msgDiv = document.getElementById('msg');
            msgDiv.textContent = data.msg;
            msgDiv.style.display = 'block';
            msgDiv.className = data.success ? 'alert-message alert-success' : 'alert-message alert-error';


            if (data.success) {
                // Atualiza o botão e armazena no localStorage
                btn.innerHTML = '<i class="fas fa-check"></i> Candidatura enviada';
                btn.classList.add('disabled');
                btn.disabled = true;
                
                // Armazena a candidatura no localStorage
                const candidaturas = JSON.parse(localStorage.getItem('candidaturas')) || [];
                if (!candidaturas.includes(idVaga)) {
                    candidaturas.push(idVaga);
                    localStorage.setItem('candidaturas', JSON.stringify(candidaturas));
                }
            } else {
                btn.innerHTML = '<i class="fas fa-paper-plane"></i> Candidatar-se';
                btn.disabled = false;
            }

            setTimeout(() => msgDiv.style.display = 'none', 3000);

        } catch (error) {
            console.error('Erro:', error);
            const msgDiv = document.getElementById('msg');
            msgDiv.textContent = 'Erro ao processar candidatura';
            msgDiv.style.display = 'block';
            msgDiv.className = 'alert-message alert-error';
            
            btn.innerHTML = '<i class="fas fa-paper-plane"></i> Candidatar-se';
            btn.disabled = false;
            
            setTimeout(() => msgDiv.style.display = 'none', 3000);
        }
    }

    function filtrarServicos() {
        const categoria = document.getElementById('categoria').value;
        const localizacao = document.getElementById('localizacao').value.toLowerCase();
        const cards = document.querySelectorAll('.servico-card');
        
        let cardsVisiveis = 0;
        
        cards.forEach(card => {
            const cardCategoria = card.getAttribute('data-categoria');
            const cardLocalizacao = card.getAttribute('data-localizacao');
            
            const categoriaMatch = categoria === '' || cardCategoria === categoria;
            const localizacaoMatch = localizacao === '' || cardLocalizacao.includes(localizacao);
            
            if (categoriaMatch && localizacaoMatch) {
                card.style.display = 'block';
                cardsVisiveis++;
            } else {
                card.style.display = 'none';
            }
        });

        const msgDiv = document.getElementById('msg');
        if (cardsVisiveis === 0) {
            msgDiv.textContent = 'Nenhum serviço encontrado com os filtros selecionados.';
            msgDiv.style.display = 'block';
            msgDiv.className = 'alert-message alert-error';
        } else {
            msgDiv.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        
        inicializarCandidaturas();
        
      
        const urlParams = new URLSearchParams(window.location.search);
        const categoriaParam = urlParams.get('categoria');
        const localizacaoParam = urlParams.get('localizacao');
        
        if (categoriaParam) {
            document.getElementById('categoria').value = categoriaParam;
        }
        
        if (localizacaoParam) {
            document.getElementById('localizacao').value = localizacaoParam;
        }
        
        if (categoriaParam || localizacaoParam) {
            filtrarServicos();
        }

        
        document.getElementById('localizacao').addEventListener('input', filtrarServicos);
        document.getElementById('categoria').addEventListener('change', filtrarServicos);
    });
</script>
</body>
</html>