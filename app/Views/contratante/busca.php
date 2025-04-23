<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Freelancers - Contratante</title>

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
            text-align: center;
        }

        .btn-buscar {
            background-color: #004182;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: block;
            width: 200px;
            margin: 20px auto;
            text-align: center;
        }

        .btn-buscar:hover {
            background-color: #0a66c2;
            transform: translateY(-2px);
        }

        .freelancers-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .freelancer-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e0e0e0;
        }

        .freelancer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }

        .freelancer-header {
            background-color: #004182;
            color: white;
            padding: 15px;
            position: relative;
        }

        .freelancer-title {
            margin: 0;
            font-size: 1.4rem;
            font-weight: 600;
        }

        .freelancer-categoria {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.2);
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .freelancer-body {
            padding: 20px;
        }

        .freelancer-info {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
        }

        .freelancer-info i {
            margin-right: 10px;
            color: #004182;
            min-width: 20px;
            text-align: center;
            margin-top: 3px;
        }

        .freelancer-info div {
            flex: 1;
        }

        .freelancer-label {
            font-weight: 600;
            color: #555;
            font-size: 0.9rem;
        }

        .freelancer-value {
            color: #333;
            word-break: break-word;
        }

        .freelancer-actions {
            display: flex;
            justify-content: center;
            padding: 15px;
            border-top: 1px solid #eee;
            background-color: #f9f9f9;
        }

        .btn-contato {
            background-color: #004182;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .btn-contato:hover {
            background-color: #0a66c2;
            color: white;
            transform: translateY(-2px);
        }

        .filtros-container {
            background-color: #f0f7ff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .filtros-container h5 {
            color: #004182;
            margin-bottom: 15px;
        }

        .filtros-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .filtro-item {
            flex: 1;
            min-width: 200px;
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
    <?php include 'menuContratante.php'; ?>

    <div class="container">
        <div class="busca-section">
            <h1>Encontre Freelancers</h1>
            
            
            <div class="filtros-container">
                <h5><i class="fas fa-filter"></i> Filtros de Busca</h5>
                <div class="filtros-group">
                    <div class="filtro-item">
                        <label for="categoria" class="form-label">Categoria:</label>
                        <select id="categoria" class="form-select">
                        <option value=""></option>
                                <?php foreach($cargos as $cargo): ?>
                                <option value="<?php echo $cargo['id']?>"><?php echo $cargo['cargo']?></option>
                                <?php endforeach;?>
                        </select>
                    </div>
                    
                    <div class="filtro-item">
                        <label for="localizacao" class="form-label">Localização:</label>
                        <input type="text" id="localizacao" class="form-control" placeholder="Cidade ou Estado">
                    </div>
                </div>
            </div>
            
            <button class="btn-buscar" onclick="filtrarServicos()">
                <i class="fas fa-search"></i> Buscar Freelancers
            </button>

            <div class="freelancers-container">
                <?php foreach ($freelacers as $freelancer):
                    $telefone = preg_replace('/[^0-9]/', '', $freelancer['telefone']);
                    $whatsappLink = "https://wa.me/55{$telefone}";
                    
                
                    // $categorias = explode(',', $freelancer['cargos']);
                    // $categoriaPrincipal = trim($categorias[0]);
                ?>
                <div class="freelancer-card">
                    <div class="freelancer-header">
                        <h3 class="freelancer-title"><?php echo htmlspecialchars($freelancer['nome']); ?></h3>
                        <span class="freelancer-categoria"><?php // echo htmlspecialchars($categoriaPrincipal); ?></span> 
                    </div>
                    
                    <div class="freelancer-body">
                        <div class="freelancer-info">
                            <i class="fas fa-briefcase"></i>
                            <div>
                                <div class="freelancer-label">Habilidades</div>
                                <div class="freelancer-value"><?php $cargosfreelancer = $CargosFreelancerController->ExibirCargosFreelancer($freelancer['user_id']);?>
                                <?php foreach($cargosfreelancer as $cargofreelancer): ?>
                                    <p><?php echo $cargofreelancer['cargo'] ?> </p>
                                <?php endforeach ?></div>
                            </div>
                        </div>
                        
                        <div class="freelancer-info">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <div class="freelancer-label">Localização</div>
                                <div class="freelancer-value">
                                    <?php echo htmlspecialchars($freelancer['cidade']); ?>, <?php echo htmlspecialchars($freelancer['estado']); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="freelancer-info">
                            <i class="fas fa-phone"></i>
                            <div>
                                <div class="freelancer-label">Contato</div>
                                <div class="freelancer-value"><?php echo htmlspecialchars($freelancer['telefone']); ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="freelancer-actions">
                        <a href="<?php echo $whatsappLink; ?>" target="_blank" class="btn-contato">
                            <i class="fab fa-whatsapp"></i> Contatar
                        </a>

                        <button class="btn btn-sm btn-outline-primary btn-vaga" data-bs-dismiss="modal" onclick="verInformacoes(<?php echo htmlspecialchars($freelancer['id']); ?>)">
                            Ver informações
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Modal para informações do freelancer-->
    <div class="modal fade" id="modalInformacoes" tabindex="-1" aria-labelledby="modalAdicionarServicoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAdicionarServicoLabel">Solicitações</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="modal-body" id="conteudoInformacoes">
                            <!-- Conteúdo gerado via JS entra aqui -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="btn-cargo" id="btn-contratar" class="btn btn-success" data-bs-dismiss="modal" onclick="contratarFreelancer()">Contratar</button>
                        </div>
                </div>
            </div>
        </div>               
    </div>

    <?= $pager->links() ?>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 e-Jobs. Todos os direitos reservados.</p>
            <p><a href="#">Política de Privacidade</a> | <a href="#">Termos de Uso</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function verInformacoes(idFreelancer, idSolicitacao){

            solicitacaoId = idSolicitacao;
            freelancerId = idFreelancer;

            const listarInformacoes = async (idFreelancer) => {
                try {
                    const response2 = await fetch('<?php echo base_url("/contratante/vagaspub?idFreelancer=") ?>' + idFreelancer);
                    const data2 = await response2.json();

                    if(data2.informacoes && data2.informacoes.length > 0){
                        let html = '';
                        data2.informacoes.forEach(informacoes => {
                            html += `
                            <div class="card card-profile">
                                <input type="hidden" value="${informacoes.id}">
                                <div class="card-header">
                                    <h3><i class="fas fa-user-tie"></i> Informações do Freelancer</h3>
                                </div>
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
                                    
                                    <div class="info-item">
                                    <div class="freelancer-info"><i class="fas fa-briefcase"></i></div>
                                        <div class="info-content">
                                            <h4>Habilidades</h4>
                                            <div id="habilidades"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
  
                    document.getElementById("conteudoInformacoes").innerHTML = html;
                    }

                    if(data2.cargosFreelancer && data2.cargosFreelancer.length > 0){
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



    </script>

</body>
</html>