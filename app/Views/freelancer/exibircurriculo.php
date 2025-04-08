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

        /* Estilo do botão igual ao da tela de busca */
        .btn-edit {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 20px auto;
            display: block;
            width: fit-content;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-edit:hover {
            background-color: var(--secondary);
            color: white;
        }

        .btn-edit i {
            margin-right: 8px;
        }

        footer {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 2rem 0;
            text-align: center;
            margin-top: 3rem;
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

            <div class="card card-profile">
                <div class="card-header">
                    <h3><i class="fas fa-graduation-cap"></i> Formações</h3>
                </div>
                <div class="skills-section">
                    <?= nl2br(htmlspecialchars($freelancer['formacoes'])) ?>
                </div>
                <a href="<?= base_url('freelancer/editarcurriculo/' . $freelancer['id']) ?>" class="btn btn-edit">
                    <i class="fas fa-edit"></i> Editar Currículo
                </a>
            </div>

            <div class="card card-profile">
                <div class="card-header">
                    <h3><i class="fas fa-briefcase"></i> Cargos e Habilidades</h3>
                </div>
                <?php foreach($cargosfreelancer as $cargofreelancer): ?>
                    <p><?php echo $cargofreelancer['cargo'] ?>   <a href="<?php echo base_url('freelancer/excluircargo/'.$cargofreelancer['id'])?>">Excluir cargo</a></p>
                <?php endforeach ?>

                <div class="container">
                    <div class="servicos-section">
                        <button class="btn-adicionar" onclick="abrirModalAdicionar()">
                            <i class="fas fa-plus"></i> Adicionar Cargo
                        </button>
                        
                        <div class="modal fade" id="modalAdicionarServico" tabindex="-1" aria-labelledby="modalAdicionarServicoLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalAdicionarServicoLabel">Adicionar Serviço</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formAdicionarServico" method="post">
                                                <label for="statusServico" class="form-label">Cargo:</label>
                                                <select class="form-select" id="statusServico" name="cargo_id" required>
                                                    <?php foreach($cargos as $cargo): ?>
                                                    <option value="<?php echo $cargo['id']?>"><?php echo $cargo['cargo']?></option>
                                                    <?php endforeach;?>
                                                </select><br>
                                                
                                                <div class="servicos-section">
                                                    <button type="button" class="btn-adicionar" onclick="abrirModalNovoCargo()">
                                                    <i class="fas fa-plus"></i> Novo cargo
                                                    </button>
                                                </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" name="btn-cargo" value="adicionarcargo" class="btn btn-primary" >Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>               
                        </div>
                    </div>
                </div>
                

                <!-- Inserir novo cargo -->
                <div class="modal fade" id="modalNovoCargo" tabindex="-1" aria-labelledby="modalAdicionarServicoLabel" aria-hidden="true">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalAdicionarServicoLabel">Novo cargo</h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAdicionarServico" method="post">
                                        <label for="statusServico" class="form-label">Cargo:</label>
                                        <input type="text" name="novocargo">
                                                                            
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="submit" name="btn-cargo" value="novocargo" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </form>
                            </div>
                                                                
                        </div>
                    </div>               
                </div>

            </div>
        <?php endforeach; ?>
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
            const modal = new bootstrap.Modal(document.getElementById('modalNovoCargo'));
            modal.show();
        }
    </script>
</body>
</html>