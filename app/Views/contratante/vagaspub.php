<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de serviços</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .servicos-section {
            padding: 50px 0;
            background-color: #ffffff;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .servicos-section h1 {
            color: #004182;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-adicionar {
            background-color: #004182;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 30px;
            display: block;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        .btn-adicionar:hover {
            background-color: #0a66c2;
            transform: translateY(-2px);
        }

        .eventos-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .evento-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e0e0e0;
        }

        .evento-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }

        .evento-header {
            background-color: #004182;
            color: white;
            padding: 15px;
            position: relative;
        }

        .evento-title {
            margin: 0;
            font-size: 1.4rem;
            font-weight: 600;
        }

        .evento-status {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.2);
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .evento-body {
            padding: 20px;
        }

        .evento-info {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
        }

        .evento-info i {
            margin-right: 10px;
            color: #004182;
            min-width: 20px;
            text-align: center;
            margin-top: 3px;
        }

        .evento-info div {
            flex: 1;
        }

        .evento-label {
            font-weight: 600;
            color: #555;
            font-size: 0.9rem;
        }

        .evento-value {
            color: #333;
            word-break: break-word;
        }

        .evento-actions {
            display: flex;
            justify-content: flex-end;
            padding: 15px;
            border-top: 1px solid #eee;
            background-color: #f9f9f9;
        }

        .btn-acao {
            margin-left: 10px;
            border-radius: 5px;
            padding: 6px 12px;
            font-size: 0.9rem;
        }

        .status-disponivel {
            color: #28a745;
        }

        .status-esgotado {
            color: #dc3545;
        }

        .data-destaque {
            background-color: #f0f7ff;
            padding: 10px;
            border-radius: 6px;
            text-align: center;
            margin-bottom: 15px;
        }

        .data-dia {
            font-size: 1.8rem;
            font-weight: bold;
            color: #004182;
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

        .vagas-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f5f5f5;
            padding: 8px 12px;
            border-radius: 6px;
            margin-top: 10px;
        }

        .vagas-count {
            font-weight: bold;
            color: #004182;
        }

        .footer {
            text-align: center;
            padding: 25px;
            background-color: #004182;
            color: #ffffff;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .eventos-container {
                grid-template-columns: 1fr;
            }
            
            .btn-adicionar {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <?php include 'menuContratante.php'; ?>

    <div class="container">
        <div class="servicos-section">
            <h1>Meus Eventos</h1>
            <button class="btn-adicionar" onclick="abrirModalAdicionar()">
                <i class="fas fa-plus"></i> Criar Novo Evento
            </button>

            <p><?php echo $msg?></p>   

            <div class="modal fade" id="modalAdicionarServico" tabindex="-1" aria-labelledby="modalAdicionarServicoLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAdicionarServicoLabel">Criar evento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAdicionarServico" method="post">
                                <div class="mb-3">
                                    <label for="nomeServico" class="form-label">Nome do Evento:</label>
                                    <input type="text" class="form-control" id="nomeServico" name="nome" required>
                                </div>
                                <div class="mb-3">
                                    <label for="descricaoServico" class="form-label">Descrição:</label>
                                    <textarea class="form-control" id="descricaoServico" name="descricao" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="dataServico" class="form-label">Data:</label>
                                    <input type="date" class="form-control" id="dataServico" name="data" required>
                                </div>
                                <div class="mb-3">
                                    <label for="endereco" class="form-label">Endereço:</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cidade" class="form-label">Cidade:</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" required>
                                </div>
                                <div class="mb-3">
                                    <label for="vagas" class="form-label">Vagas:</label>
                                    <input type="number" class="form-control" id="vagas" name="vagas" required>
                                </div>
                                <div class="mb-3">
                                    <label for="statusServico" class="form-label">Status:</label>
                                    <select class="form-select" id="statusServico" name="status" required>
                                        <option value="Disponivel">Disponível</option>
                                        <option value="Esgotado">Esgotado</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="eventos-container">
                <?php foreach($eventos as $evento): 
                    $dataEvento = new DateTime($evento['data']);
                    ?>
                    <div class="evento-card">
                        <div class="evento-header">
                            <h3 class="evento-title"><?php echo htmlspecialchars($evento['nome']); ?></h3>
                            <span class="evento-status <?php echo $evento['status'] == 'Disponivel' ? 'status-disponivel' : 'status-esgotado'; ?>">
                                <?php echo htmlspecialchars($evento['status'] == 'Disponivel' ? 'Disponível' : 'Esgotado'); ?>
                            </span>
                        </div>
                        
                        <div class="evento-body">
                            <div class="data-destaque">
                                <div class="data-dia"><?php echo $dataEvento->format('d'); ?></div>
                                <div class="data-mes"><?php echo $dataEvento->format('M'); ?></div>
                                <div class="data-ano"><?php echo $dataEvento->format('Y'); ?></div>
                            </div>
                            
                            <div class="evento-info">
                                <i class="fas fa-align-left"></i>
                                <div>
                                    <div class="evento-label">Descrição</div>
                                    <div class="evento-value"><?php echo htmlspecialchars($evento['descricao']); ?></div>
                                </div>
                            </div>
                            
                            <div class="evento-info">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <div class="evento-label">Local</div>
                                    <div class="evento-value">
                                        <?php echo htmlspecialchars($evento['endereco']); ?><br>
                                        <?php echo htmlspecialchars($evento['cidade']); ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="vagas-info">
                                <span>Vagas disponíveis:</span>
                                <span class="vagas-count"><?php echo htmlspecialchars($evento['vagas']); ?></span>
                            </div>
                        </div>
                        
                        <div class="evento-actions">
                            <button class="btn btn-sm btn-primary btn-acao" title="Editar">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                            <button class="btn btn-sm btn-danger btn-acao" title="Excluir">
                                <i class="fas fa-trash-alt"></i> <a href="<?php echo base_url('contratante/excluirevento/'.$evento['id'])?>">Excluir</a>
                            </button>
                        </div>
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
        function abrirModalAdicionar() {
            const modal = new bootstrap.Modal(document.getElementById('modalAdicionarServico'));
            modal.show();
        }

        // Adicione aqui funções para editar e excluir eventos
    </script>
</body>
</html>