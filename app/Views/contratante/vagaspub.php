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
        }

        .servicos-section .btn-adicionar {
            background-color: #004182;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
        }

        .servicos-section .btn-adicionar:hover {
            background-color: #0a66c2;
        }

        .servicos-section .servico-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }

        .servicos-section .servico-card h3 {
            color: #004182;
            margin-bottom: 10px;
        }

        .servicos-section .servico-card p {
            color: #333;
            margin-bottom: 5px;
        }

        .servicos-section .servico-card .status {
            font-weight: bold;
            color: #28a745; 
        }

        .servicos-section .servico-card .status.pendente {
            color: #dc3545; 
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
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- chamando o Menu no arquivo menuFreelancer -->
    <?php include 'menuContratante.php'; ?>

    <div class="container">
        <div class="servicos-section">
            <h1>Eventos</h1>
            <button class="btn-adicionar" onclick="abrirModalAdicionar()">
                <i class="fas fa-plus"></i> Criar evento
            </button>

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
                            <input type="text" class="form-control" id="nomeServico" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricaoServico" class="form-label">Descrição:</label>
                            <textarea class="form-control" id="descricaoServico" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="dataServico" class="form-label">Data:</label>
                            <input type="date" class="form-control" id="dataServico" required>
                        </div>
                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereço:</label>
                            <input type="text" class="form-control" id="endereco" required>
                        </div>
                        <div class="mb-3">
                            <label for="cidade" class="form-label">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" required>
                        </div>
                        <div class="mb-3">
                            <label for="vagas" class="form-label">Vagas:</label>
                            <textarea class="form-control" id="vagas" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="statusServico" class="form-label">Status:</label>
                            <select class="form-select" id="statusServico" required>
                                <option value="Concluído">Disponivel</option>
                                <option value="Pendente">Esgotado</option>
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

        function adicionarServico() {
            const nomeServico = document.getElementById('nomeServico').value;
            const descricaoServico = document.getElementById('descricaoServico').value;
            const dataServico = document.getElementById('dataServico').value;
            const statusServico = document.getElementById('statusServico').value;

            if (nomeServico && descricaoServico && dataServico && statusServico) {
                const novoServico = `
                    <div class="servico-card">
                        <h3>${nomeServico}</h3>
                        <p><strong>Descrição:</strong> ${descricaoServico}</p>
                        <p><strong>Data:</strong> ${dataServico}</p>
                        <p class="status ${statusServico === 'Pendente' ? 'pendente' : ''}">${statusServico}</p>
                    </div>
                `;

                document.getElementById('listaServicos').insertAdjacentHTML('beforeend', novoServico);
                const modal = bootstrap.Modal.getInstance(document.getElementById('modalAdicionarServico'));
                modal.hide();
            } else {
                alert('Por favor, preencha todos os campos.');
            }
        }
    </script>
</body>

</html>