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
            color:rgb(91, 240, 125);
        }

        .status-esgotado {
            color:rgb(251, 255, 0);
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

        .modal-info-header {
            background-color: #004182;
            color: white;
            padding: 15px 20px;
        }

        .modal-info-title {
            font-weight: 600;
            margin: 0;
        }

        .modal-info-header {
            background-color: #004182;
            color: white;
            padding: 15px 20px;
        }

        .modal-info-title {
            font-weight: 600;
            margin: 0;
        }


        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .info-item {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            background-color: #f0f7ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .info-icon {
            color: #004182;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .info-content h4 {
            color: #004182;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .info-content p {
            color: #333;
            margin: 0;
        }

        .modal-info-footer {
            border-top: 1px solid #eee;
            padding: 15px 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-contratar {
            background-color: #28a745;
            color: white;
            padding: 8px 20px;
            border-radius: 5px;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-contratar:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .habilidades-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 5px;
        }

        .habilidade-badge {
            background-color: #e9f0f8;
            color: #004182;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        

        .info-item:hover {
            background-color: #f0f7ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Estilos para as vagas */
        .vagas-container {
            margin-top: 15px;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        .vaga-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 12px;
            background-color: #f8f9fa;
            border-radius: 6px;
            margin-bottom: 8px;
            border-left: 4px solid #004182;
            transition: all 0.2s ease;
        }

        .vaga-item:hover {
            background-color: #e9ecef;
            transform: translateX(3px);
        }

        .vaga-info {
            display: flex;
            flex-direction: column;
        }

        .vaga-cargo {
            font-weight: 600;
            color: #004182;
        }

        .vaga-quantidade {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .vaga-actions {
            display: flex;
            gap: 5px;
        }

        .btn-vaga {
            padding: 3px 8px;
            font-size: 0.75rem;
        }

        /* Estilo para o modal de vagas */
        #modalAdicionarNovaVaga .modal-content {
            border-radius: 12px;
        }

        #modalAdicionarNovaVaga .modal-header {
            background-color: #004182;
            color: white;
            border-bottom: none;
            border-radius: 10px 10px 0 0;
        }

        #modalAdicionarNovaVaga .btn-close {
            filter: invert(1);
        }

        #modalAdicionarNovaVaga .form-select,
        #modalAdicionarNovaVaga .form-control {
            border-radius: 6px;
            padding: 10px;
            border: 1px solid #ddd;
        }

        #modalAdicionarNovaVaga .form-select:focus,
        #modalAdicionarNovaVaga .form-control:focus {
            border-color: #004182;
            box-shadow: 0 0 0 0.25rem rgba(0, 65, 130, 0.25);
        }

        @media (max-width: 768px) {
            .freelancers-container {
                grid-template-columns: 1fr;
            }
            
            .btn-buscar {
                width: 100%;
            }
            
            .filtros-group {
                flex-direction: column;
                gap: 10px;
            }
            
            .filtro-item {
                min-width: 100%;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
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

            <?php if (isset($msg) && !empty($msg)): ?>
                <p class="alert alert-info"><?php echo $msg; ?></p>
            <?php endif; ?>

            <?php if (session()->getFlashdata('msg')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('msg'); ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('msg-success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('msg-success'); ?>
                </div>
            <?php endif; ?>

            <!-- Modal Adicionar e Editar Evento -->
            <div class="modal fade" id="modalAdicionarServico" tabindex="-1"
                aria-labelledby="modalAdicionarServicoLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAdicionarServicoLabel">Criar evento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAdicionarServico" method="post">
                                <input type="hidden" id="eventoId" name="eventoId" name="id">
                                <div class="mb-3">
                                    <label for="nomeServico" class="form-label">Nome do Evento:</label>
                                    <input type="text" class="form-control" id="nomeServico" name="nome" required>
                                </div>
                                <div class="mb-3">
                                    <label for="descricaoServico" class="form-label">Descrição:</label>
                                    <textarea class="form-control" id="descricaoServico" name="descricao" rows="3"
                                        required></textarea>
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
                                    <label for="estado" class="form-label">Estado:</label>
                                    <input type="text" class="form-control" id="estado" name="estado" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" id="btneditEventos" name="btn-eventos" value="adicionarevento"
                                        class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="eventos-container">
                <?php foreach ($eventos as $evento):
                    $dataEvento = new DateTime($evento['data']);
                    ?>
                    <div class="evento-card" id="evento-<?php echo $evento['id']; ?>">
                        <div class="evento-header">
                            <h3 class="evento-title"><?php echo htmlspecialchars($evento['nome']); ?></h3>
                            <span
                                class="evento-status <?php echo $evento['status'] == true ? 'status-disponivel' : 'status-esgotado'; ?>">
                                <?php echo htmlspecialchars($evento['status'] == true ? 'Concluido' : 'Em andamento'); ?>
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
                                        <?php echo htmlspecialchars($evento['cidade']); ?><br>
                                        <?php echo htmlspecialchars($evento['estado']); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="vagas-container">
                                <h6>Vagas disponíveis:</h6>
                                <button class="btn btn-sm btn-success mb-2"
                                    onclick="abrirModalNovaVaga(<?php echo $evento['id'] ?>)">
                                    <i class="fas fa-plus"></i> Adicionar Vaga
                                </button>

                                <?php foreach ($vagas as $vaga):
                                    if ($evento['id'] == $vaga['evento_id']): ?>
                                        <div class="vaga-item">
                                            <div class="vaga-info">
                                                <span class="vaga-cargo"><?php echo htmlspecialchars($vaga['cargo']); ?></span>
                                                <span class="vaga-quantidade"><?php echo htmlspecialchars($vaga['quantidade']); ?>
                                                    vaga(s)</span>
                                            </div>
                                            <div class="vaga-actions">
                                                <button class="btn btn-sm btn-outline-primary btn-vaga"
                                                    onclick="abrirModalSolicitações(<?php echo htmlspecialchars($vaga['id']); ?>)">
                                                    Solicitações
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger btn-vaga" id="btnExcluirVaga"
                                                    onclick="excluirVaga(<?php echo $vaga['id']; ?>)" title="Excluir">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    <?php endif;
                                endforeach; ?>
                            </div>
                        </div>

                        <div class="evento-actions">
                            <button class="btn btn-sm btn-primary btn-acao" title="Editar"
                                onclick="editarEvento(<?php echo $evento['id']; ?>)">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                            <button class="btn btn-sm btn-danger btn-acao" title="Excluir"
                                onclick="confirmarExclusao(<?php echo $evento['id']; ?>)">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmação de Exclusão -->
    <div class="modal fade" id="modalConfirmacaoExclusao" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="msg-exluir">Tem certeza que deseja excluir este evento? Esta ação não pode ser desfeita.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnConfirmarExclusao" class="btn btn-danger">Excluir</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para adicionar vagas-->
    <div class="modal fade" id="modalAdicionarNovaVaga" tabindex="-1" aria-labelledby="modalAdicionarServicoLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdicionarServicoLabel">Adicionar Vaga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAdicionarVaga" method="post">
                        <input type="hidden" name="evento_id" id="evento_id">
                        <div class="mb-3">
                            <label for="cargoVaga" class="form-label">Cargo:</label>
                            <select class="form-select" id="cargoVaga" name="cargo_id" required>
                                <?php foreach ($cargos as $cargo): ?>
                                    <option value="<?php echo $cargo['id'] ?>"><?php echo $cargo['cargo'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="numeroVagas" class="form-label">Quantidade de vagas:</label>
                            <input type="number" name="quantidade" class="form-control" id="numeroVagas" required>
                        </div>
                        <div class="mb-3">
                            <label for="numeroVagas" class="form-label">Valor:</label>
                            <input type="number" name="valor" class="form-control" id="valor" step="0.01" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" name="btn-eventos" value="adicionarvaga"
                                class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalSolicitacoes" tabindex="-1" aria-labelledby="modalAdicionarServicoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdicionarServicoLabel">Solicitações</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <h6 class="modal-title" id="modalAdicionarServicoLabel">Solicitações dos Freelancers</h6>
                <div class="modal-body">
                    <div class="modal-body" id="conteudoSolicitacoesFreelancer">

                    </div>
                </div>
                <h6 class="modal-title" id="modalAdicionarServicoLabel">Suas Solicitações</h6>
                <div class="modal-body">
                    <div class="modal-body" id="conteudoSolicitacoes">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para informações do freelancer-->
    <div class="modal fade" id="modalInformacoes" tabindex="-1" aria-labelledby="modalAdicionarServicoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdicionarServicoLabel">Informações do Freelancer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body" id="conteudoInformacoes">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="btn-recusar"
                            data-bs-dismiss="modal">Recusar</button>
                        <button type="submit" name="btn-cargo" id="btn-contratar" class="btn btn-success"
                            data-bs-dismiss="modal">Contratar</button>
                    </div>
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
        let eventoIdParaExcluir = null;
        let vagaIdExcluir = null;
        let solicitacaoId = null;
        let freelancerId = null;
        let vagaId = null;

        function abrirModalAdicionar() {

            document.getElementById('formAdicionarServico').reset();
            document.getElementById('eventoId').value = '';

            document.getElementById('modalAdicionarServicoLabel').textContent = 'Criar Evento';


            const modal = new bootstrap.Modal(document.getElementById('modalAdicionarServico'));
            modal.show();
        }

        function editarEvento(id) {

            const eventoElement = document.getElementById(`evento-${id}`);

            if (!eventoElement) return;

            document.getElementById('eventoId').value = id;
            document.getElementById('nomeServico').value = eventoElement.querySelector('.evento-title').textContent;


            const descricao = eventoElement.querySelectorAll('.evento-value')[0].textContent;
            document.getElementById('descricaoServico').value = descricao.trim();


            const localInfo = eventoElement.querySelectorAll('.evento-value')[1].textContent.trim().split('\n');
            document.getElementById('endereco').value = localInfo[0].trim();
            document.getElementById('cidade').value = localInfo[1].trim();
            document.getElementById('estado').value = localInfo[2].trim();



            const dataDia = eventoElement.querySelector('.data-dia').textContent;
            const dataMes = eventoElement.querySelector('.data-mes').textContent;
            const dataAno = eventoElement.querySelector('.data-ano').textContent;

            const meses = {
                'Jan': '01', 'Fev': '02', 'Mar': '03', 'Abr': '04', 'Mai': '05', 'Jun': '06',
                'Jul': '07', 'Ago': '08', 'Set': '09', 'Out': '10', 'Nov': '11', 'Dez': '12'


            };
            const mesNumero = meses[dataMes] || '01';

            const dataFormatada = `${dataAno}-${mesNumero}-${dataDia.padStart(2, '0')}`;
            document.getElementById('dataServico').value = dataFormatada;

            document.getElementById('modalAdicionarServicoLabel').textContent = 'Editar Evento';


            const modal = new bootstrap.Modal(document.getElementById('modalAdicionarServico'));
            modal.show();



        }

        function abrirModalNovaVaga(id) {
            document.getElementById("evento_id").value = id;
            const modal = new bootstrap.Modal(document.getElementById('modalAdicionarNovaVaga'));
            modal.show();
        }


        function abrirModalSolicitações(idVaga) {

            vagaId = idVaga;

            const listarSolicitacoes = async (idVaga) => {
                try {
                    const response = await fetch('<?php echo base_url("/contratante/vagaspub?idVaga=") ?>' + idVaga);
                    const data = await response.json();

                    if (data.solicitacoes && data.solicitacoes.length > 0) {
                        let html = '';
                        let html2 = '';

                        data.solicitacoes.forEach(solicitacao => {
                            let statusLabel = '';
                            if (solicitacao.status === null) {
                                statusLabel = '<span class="vaga-quantidade alert alert-warning"><strong>Status: </strong>Aguardando confirmação...</span>';
                            } else if (solicitacao.status == 1) {
                                statusLabel = '<span class="vaga-quantidade alert alert-success"><strong>Status: </strong>Contratado</span>';
                            } else if (solicitacao.status == 0) {
                                statusLabel = '<span class="vaga-quantidade alert alert-danger"><strong>Status: </strong>Recusado</span>';
                            }

                            if (solicitacao.solicitante_id != <?php echo user_id(); ?>) {
                                html += `
                        <div>
                            <div class="vaga-item">
                                <div class="vaga-info">
                                    <span class="vaga-cargo">${solicitacao.nome}</span>
                                    ${statusLabel}
                                </div>
                                <div class="vaga-actions">
                                    <button class="btn btn-sm btn-outline-primary btn-vaga" data-bs-dismiss="modal" onclick="verInformacoes(${solicitacao.freelancer_id},${solicitacao.id})">
                                        Ver informações
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                            } else if (solicitacao.solicitante_id == <?php echo user_id(); ?>) {
                                html2 += `
                        <div class="vaga-item">
                            <div class="vaga-info">
                                <span class="vaga-cargo">${solicitacao.nome}</span>
                                ${statusLabel}
                            </div>
                        </div>
                    `;
                            }


                        });

                        if (html == '') {
                            document.getElementById("conteudoSolicitacoesFreelancer").innerHTML = "<p class='text-muted'>Nenhuma solicitação encontrada.</p>";
                        } else {
                            document.getElementById("conteudoSolicitacoesFreelancer").innerHTML = html;
                        }

                        if (html2 == '') {
                            document.getElementById("conteudoSolicitacoes").innerHTML = "<p class='text-muted'>Nenhuma solicitação encontrada.</p>";
                        } else {
                            document.getElementById("conteudoSolicitacoes").innerHTML = html2;
                        }



                    } else {
                        document.getElementById("conteudoSolicitacoes").innerHTML = "<p class='text-muted'>Nenhuma solicitação encontrada.</p>";
                    }

                } catch (error) {
                    console.error("Erro ao buscar solicitações:", error);
                    document.getElementById("conteudoSolicitacoes").innerHTML = "<p class='text-danger'>Erro ao carregar as solicitações.</p>";
                }
            };

            listarSolicitacoes(idVaga);

            const modal = new bootstrap.Modal(document.getElementById('modalSolicitacoes'));
            modal.show();
        }


        function verInformacoes(idFreelancer, idSolicitacao) {

            solicitacaoId = idSolicitacao;
            freelancerId = idFreelancer;

            const listarInformacoes = async (idFreelancer) => {
                try {
                    const response2 = await fetch('<?php echo base_url("/contratante/exibirInformacoesFreelancer?idFreelancer=") ?>' + idFreelancer);
                    const data2 = await response2.json();

                    if (data2.informacoes && data2.informacoes.length > 0) {
                        let html = '';
                        data2.informacoes.forEach(informacoes => {
                            html += `
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-icon"><i class="fas fa-user"></i></div>
                                    <div class="info-content">
                                        <h4>Nome Completo</h4>
                                        <p>${informacoes.nome}</p>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon"><i class="fas fa-phone"></i></div>
                                    <div class="info-content">
                                        <h4>Telefone</h4>
                                        <p>${informacoes.telefone}</p>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon"><i class="fas fa-envelope"></i></div>
                                    <div class="info-content">
                                        <h4>E-mail</h4>
                                        <p>${informacoes.email}</p>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon"><i class="fas fa-birthday-cake"></i></div>
                                    <div class="info-content">
                                        <h4>Data de Nascimento</h4>
                                        <p>${informacoes.dataNasc}</p>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                                    <div class="info-content">
                                        <h4>Localização</h4>
                                        <p>${informacoes.cidade}, ${informacoes.estado}</p>
                                    </div>
                                </div>
                        `;
                        });

                        document.getElementById("conteudoInformacoes").innerHTML = html;
                    }

                    if (data2.cargosFreelancer && data2.cargosFreelancer.length > 0) {
                        let html = '';
                        data2.cargosFreelancer.forEach(cargosFreelancer => {
                            html += `
                            <p>${cargosFreelancer.cargo}</p>
                                 
                        `;
                        });

                        document.getElementById("habilidades").innerHTML = html;
                    }
                } catch (error) {
                    console.log("erro");
                }
            }

            listarInformacoes(idFreelancer);

            const modal = new bootstrap.Modal(document.getElementById('modalInformacoes'));
            modal.show();
        }

        function confirmarExclusao(id) {
            eventoIdParaExcluir = id;
            const modal = new bootstrap.Modal(document.getElementById('modalConfirmacaoExclusao'));
            modal.show();
        }

        function excluirVaga(id) {
            vagaIdExcluir = id;
            document.getElementById("msg-exluir").innerHTML = "Tem certeza que deseja excluir esta vaga?";
            const modal = new bootstrap.Modal(document.getElementById('modalConfirmacaoExclusao'));
            modal.show();
        }



        document.getElementById('btnConfirmarExclusao').addEventListener('click', function () {
            if (eventoIdParaExcluir) {
                window.location.href = '<?php echo base_url("contratante/excluirevento/"); ?>' + eventoIdParaExcluir;
            }
        });

        document.getElementById('btnConfirmarExclusao').addEventListener('click', function () {
            if (vagaIdExcluir) {
                window.location.href = '<?php echo base_url("contratante/excluirvaga/"); ?>' + vagaIdExcluir;
            }
        });

        document.getElementById('btn-contratar').addEventListener('click', async function () {
            if (solicitacaoId) {
                try {
                    const response = await fetch('<?php echo base_url("/contratante/solicitacoes?IdSolicitacao=") ?>' + solicitacaoId + "&btn=contratar");
                    const data = await response.json();
                    abrirModalSolicitações(vagaId);
                } catch (error) {
                    console.error('Erro na requisição:', error);
                }
            }

        });

        document.getElementById('btn-recusar').addEventListener('click', async function () {
            if (solicitacaoId) {
                try {
                    const response = await fetch('<?php echo base_url("/contratante/solicitacoes?IdSolicitacao=") ?>' + solicitacaoId + "&btn=recusar");
                    const data = await response.json();
                    abrirModalSolicitações(vagaId);
                } catch (error) {
                    console.error('Erro na requisição:', error);
                }
            }

        });


    </script>
</body>

</html>