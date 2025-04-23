<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Currículo - Freelancer</title>

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

        .profile-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 2.5rem;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-right: 1.5rem;
        }

        .profile-title {
            color: var(--primary);
            margin: 0;
            font-weight: 700;
        }

        .profile-subtitle {
            color: #6c757d;
            margin: 0.25rem 0 0;
            font-weight: 400;
        }

        .card-profile {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            border: none;
            overflow: hidden;
        }

        .card-header {
            background-color: var(--primary);
            color: white;
            padding: 1.25rem 1.5rem;
            border-bottom: none;
        }

        .card-header h3 {
            margin: 0;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .card-header h3 i {
            margin-right: 0.75rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 1.5rem;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
        }

        .info-icon {
            color: var(--primary);
            font-size: 1.1rem;
            margin-right: 1rem;
            margin-top: 0.2rem;
            min-width: 20px;
        }

        .info-content h4 {
            color: var(--primary);
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-content p {
            margin: 0;
            font-size: 1rem;
        }

        .skills-section {
            padding: 1.5rem;
            background-color: var(--primary-light);
            border-radius: 8px;
            margin: 1rem 1.5rem 1.5rem;
            line-height: 1.6;
        }

        /* Estilo unificado para botões */
        .btn-adicionar, .btn-editar {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 20px auto;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-adicionar:hover, .btn-editar:hover {
            background-color: var(--secondary);
            color: white;
        }

        .btn-adicionar i, .btn-editar i {
            margin-right: 8px;
        }

        footer {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 2rem 0;
            text-align: center;
            margin-top: 3rem;
        }

        /* Estilos para a seção de cargos */
        .cargo-item {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #eee;
            gap: 15px;
        }

        .cargo-item:last-child {
            border-bottom: none;
        }

        .cargo-nome {
            font-weight: 500;
            color: var(--primary);
            flex-grow: 1;
        }

        .btn-excluir {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
            display: inline-flex;
            align-items: center;
            font-size: 0.9rem;
            
        }

        .btn-excluir:hover {
            background-color: #bb2d3b;
            color: white;
        }

        .btn-excluir i {
            margin-right: 5px;
        }

        /* Estilos para os modais */
        .modal-header {
            background-color: var(--primary);
            color: white;
        }

        .modal-title {
            font-weight: 600;
        }

        .modal-content {
            border-radius: 12px;
            overflow: hidden;
        }

        .form-label {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .form-select, .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            margin-bottom: 1rem;
        }

        .form-select:focus, .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(0, 65, 130, 0.25);
        }

        .buttons-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }

        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-avatar {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .buttons-container {
                flex-direction: column;
                align-items: center;
            }
            
            .cargo-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .btn-excluir {
                align-self: flex-end;
                
            }
        }
    </style>
</head>

<body>
    <?php include 'menuFreelancer.php'; ?>

    <div class="profile-container">
        <div class="profile-header">
            <img src="https://ui-avatars.com/api/?name=<?= urlencode($freelancer['nome'] ?? 'Freelancer') ?>&background=004182&color=fff"
                alt="Avatar" class="profile-avatar">
            <div>
                <h1 class="profile-title"><?= htmlspecialchars($freelancer['nome'] ?? 'Meu Currículo') ?></h1>
                <p class="profile-subtitle">Freelancer e-Jobs</p>
            </div>
        </div>

        <?php foreach ($freelancers as $freelancer): ?>
            <div class="card card-profile">
                <div class="card-header">
                    <h3><i class="fas fa-user-tie"></i> Informações Pessoais</h3>
                </div>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-user"></i></div>
                        <div class="info-content">
                            <h4>Nome Completo</h4>
                            <p><?= htmlspecialchars($freelancer['nome']) ?></p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-phone"></i></div>
                        <div class="info-content">
                            <h4>Telefone</h4>
                            <p><?= htmlspecialchars($freelancer['telefone']) ?></p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-envelope"></i></div>
                        <div class="info-content">
                            <h4>E-mail</h4>
                            <p><?= htmlspecialchars($freelancer['email']) ?></p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-birthday-cake"></i></div>
                        <div class="info-content">
                            <h4>Data de Nascimento</h4>
                            <p><?= htmlspecialchars($freelancer['dataNasc']) ?></p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="info-content">
                            <h4>Localização</h4>
                            <p><?= htmlspecialchars($freelancer['cidade']) ?>, <?= htmlspecialchars($freelancer['estado']) ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-profile">
                <div class="card-header">
                    <h3><i class="fas fa-graduation-cap"></i> Formações</h3>
                </div>
                <div class="skills-section">
                    <?= nl2br(htmlspecialchars($freelancer['formacoes'])) ?>
                </div>
            </div>

            <div class="card card-profile">
                <div class="card-header">
                    <h3><i class="fas fa-briefcase"></i> Cargos e Habilidades</h3>
                </div>
                
                <div class="cargos-list">
                    <?php foreach($cargosfreelancer as $cargofreelancer): ?>
                        <div class="cargo-item">
                            <span class="cargo-nome"><?php echo $cargofreelancer['cargo'] ?></span>
                            <a href="<?php echo base_url('freelancer/excluircargo/'.$cargofreelancer['id'])?>" class="btn-excluir">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
                
                <div class="buttons-container">
                    <button class="btn-adicionar" onclick="abrirModalAdicionar()">
                        <i class="fas fa-plus"></i> Adicionar Cargo
                    </button>
                    
                    <a href="<?= base_url('freelancer/editarcurriculo/' . $freelancer['id']) ?>" class="btn-editar">
                        <i class="fas fa-edit"></i> Editar Currículo
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Modal Adicionar Cargo -->
    <div class="modal fade" id="modalAdicionarServico" tabindex="-1" aria-labelledby="modalAdicionarServicoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-briefcase me-2"></i>Adicionar Cargo</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAdicionarServico" method="post">
                        <div class="mb-3">
                            <label for="statusServico" class="form-label">Selecione um cargo:</label>
                            <select class="form-select" id="statusServico" name="cargo_id" required>
                                <?php foreach($cargos as $cargo): ?>
                                <option value="<?php echo $cargo['id']?>"><?php echo $cargo['cargo']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary" onclick="abrirModalNovoCargo()">
                                <i class="fas fa-plus-circle me-2"></i>Adicionar Novo Cargo
                            </button>
                        </div>

                        <div class="modal-footer mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times me-2"></i>Cancelar
                            </button>
                            <button type="submit" name="btn-cargo" value="adicionarcargo" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Salvar Cargo
                            </button>
                        </div>
                    </form>
                </div>
            </div>               
        </div>
    </div>

    <!-- Modal Novo Cargo -->
    <div class="modal fade" id="modalNovoCargo" tabindex="-1" aria-labelledby="modalNovoCargoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus-circle me-2"></i>Novo Cargo</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formNovoCargo" method="post">
                        <div class="mb-3">
                            <label for="novoCargoInput" class="form-label">Nome do Cargo:</label>
                            <input type="text" class="form-control" id="novoCargoInput" name="novocargo" required>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times me-2"></i>Cancelar
                            </button>
                            <button type="submit" name="btn-cargo" value="novocargo" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Salvar Novo Cargo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>               
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2025 e-Jobs. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function abrirModalAdicionar() {
            const modal = new bootstrap.Modal(document.getElementById('modalAdicionarServico'));
            modal.show();
        }
        function abrirModalNovoCargo() {
            const modalAdicionar = bootstrap.Modal.getInstance(document.getElementById('modalAdicionarServico'));
            modalAdicionar.hide();
            
            const modalNovo = new bootstrap.Modal(document.getElementById('modalNovoCargo'));
            modalNovo.show();
        }
    </script>
</body>
</html>