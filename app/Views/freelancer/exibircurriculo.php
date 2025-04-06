<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Currículo - Freelancer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .curriculo-section {
            padding: 50px 0;
            background-color: #ffffff;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .curriculo-section h1 {
            color: #004182;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .info-label {
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }

        .info-value {
            margin-bottom: 15px;
            padding: 8px;
            background-color: #f8f9fa;
            border-radius: 5px;
            border-left: 4px solid #004182;
        }

        .edit-btn {
            background-color: #004182;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            text-decoration: none;
            display: inline-block;
        }

        .edit-btn:hover {
            background-color: #0a66c2;
            color: #ffffff;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #004182;
            color: #ffffff;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <!-- chamando o Menu no arquivo menuFreelancer -->
    <?php include 'menuFreelancer.php'; ?>


    <div class="container">
        <div class="curriculo-section">
            <h1>Meu Currículo</h1>

            <?php foreach ($freelancers as $freelancer): ?>
                <div class="info-label">Nome: <?php echo $freelancer['nome'] ?></div>

                <div class="info-label">Telefone: <?php echo $freelancer['telefone'] ?></div>


                <div class="info-label">E-mail: <?php echo $freelancer['email'] ?></div>


                <div class="info-label">Data de Nascimento: <?php echo $freelancer['dataNasc'] ?></div>


                <div class="info-label">Estado: <?php echo $freelancer['estado'] ?> </div>


                <div class="info-label">Cidade: <?php echo $freelancer['cidade'] ?> </div>


                <div class="info-label">Formações: <?php echo $freelancer['formacoes'] ?> </div>

                <div class="info-label">Cargos: <?php echo $freelancer['cargos'] ?> </div>
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

                <?php endforeach; ?>

            <div class="text-center">
                <a href="<?php echo base_url('freelancer/editarcurriculo/' . $freelancer['id']) ?>" class="edit-btn"><i
                        class="fas fa-edit"></i> Alterar Informações</a>
            </div>

        </div>
    </div>

    <footer class="footer">
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