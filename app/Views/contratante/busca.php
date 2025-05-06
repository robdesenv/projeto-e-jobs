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
            gap: 10px;
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

        /* Estilos para o modal de informações */
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
                        <label for="cargo" class="form-label">Cargo:</label>
                        <select id="cargo" class="form-select" onchange="filtrarFreelancer()">
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
            
            <button class="btn-buscar" onclick="filtrarFreelancer()">
                <i class="fas fa-search"></i> Buscar Freelancers
            </button>

           <?php if(session()->getFlashdata('msg')): ?>
                    <?= session()->getFlashdata('msg'); ?>
            <?php endif; ?>

            <div class="freelancers-container" id="listarFreelancers">
                    <!-- Aqui será exibida as informações dos freelancers retornadas da função filtrarFreelancers-->
            </div>
        </div>
    </div>
    
    <!-- Modal para informações do freelancer -->
    <div class="modal fade" id="modalInformacoes" tabindex="-1" aria-labelledby="modalInformacoesLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-info-header">
                    <h5 class="modal-info-title"><i class="fas fa-user-tie"></i> Informações do Freelancer</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body" id="conteudoInformacoes">
                    <!-- Conteúdo será inserido via JavaScript -->
                </div>
                
                <div class="modal-info-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn-contratar" id="btn-contratar" onclick="contratarFreelancer()">
                        <i class="fas fa-handshake"></i> Contratar
                    </button>
                </div>
            </div>
        </div>               
    </div>
    
    <!-- Modal vagas disponíveis -->
    <div class="modal fade" id="vagasModal" tabindex="-1" aria-labelledby="vagasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #004182; color: white;">
                    <h5 class="modal-title"><i class="fas fa-briefcase"></i> Vagas disponíveis</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <div class="vagas-container">
                        <?php foreach($vagas as $index => $vaga):?>
                            <form action="" method="post" class="vaga-item">
                                <input type="hidden" id="idFreelancer" class="idFreelancer" name="idFreelancer">
                                <input type="hidden" name="idVaga" value="<?php echo htmlspecialchars($vaga['id']);?>">
                                <input type="hidden" name="idEvento" value="<?php echo htmlspecialchars($vaga['evento_id']);?>">
                                
                                <div class="vaga-info">
                                    <h6><?php echo htmlspecialchars($vaga['cargo']); ?></h6>
                                    <p class="text-muted">Evento: <?php echo htmlspecialchars($vaga['nome']); ?></p>
                                </div>
                                
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-check"></i> Contratar
                                </button>
                            </form>    
                        <?php endforeach?>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 e-Jobs. Todos os direitos reservados.</p>
            <p><a href="#" style="color: #ffffff;">Política de Privacidade</a> | <a href="#" style="color: #ffffff;">Termos de Uso</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let UserIdGlobal = null;

        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        document.addEventListener("DOMContentLoaded", async function() {
            filtrarFreelancer();
        });


        function verInformacoes(idFreelancer, UserId) {
            UserIdGlobal = UserId;
            
            const listarInformacoes = async (idFreelancer) => {
                try {
                    const response = await fetch('<?php echo base_url("/contratante/exibirInformacoesFreelancer?idFreelancer=") ?>' + idFreelancer);
                    const data = await response.json();

                    let html = '';
                    
                    if(data.informacoes && data.informacoes.length > 0) {
                        const info = data.informacoes[0];
                        
                        html += `
                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-icon"><i class="fas fa-user"></i></div>
                                    <div class="info-content">
                                        <h4>Nome Completo</h4>
                                        <p>${info.nome}</p>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon"><i class="fas fa-phone"></i></div>
                                    <div class="info-content">
                                        <h4>Telefone</h4>
                                        <p>${info.telefone}</p>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon"><i class="fas fa-envelope"></i></div>
                                    <div class="info-content">
                                        <h4>E-mail</h4>
                                        <p>${info.email}</p>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon"><i class="fas fa-birthday-cake"></i></div>
                                    <div class="info-content">
                                        <h4>Data de Nascimento</h4>
                                        <p>${info.dataNasc}</p>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                                    <div class="info-content">
                                        <h4>Localização</h4>
                                        <p>${info.cidade}, ${info.estado}</p>
                                    </div>
                                </div>
                        `;
                        
                        if(data.cargosFreelancer && data.cargosFreelancer.length > 0) {
                            html += `
                                <div class="info-item">
                                    <div class="info-icon"><i class="fas fa-briefcase"></i></div>
                                    <div class="info-content">
                                        <h4>Habilidades</h4>
                                        <div class="habilidades-list">
                            `;
                            
                            data.cargosFreelancer.forEach(cargo => {
                                html += `<span class="habilidade-badge">${cargo.cargo}</span>`;
                            });
                            
                            html += `
                                        </div>
                                    </div>
                                </div>
                            `;
                        }
                        
                        html += `</div>`; // Fecha info-grid
                    } else {
                        html = `<p class="text-center py-4">Nenhuma informação encontrada para este freelancer.</p>`;
                    }
                    
                    document.getElementById("conteudoInformacoes").innerHTML = html;
                    
                    // Mostra o botão de contratar apenas se houver informações
                    document.getElementById("btn-contratar").style.display = data.informacoes && data.informacoes.length > 0 ? "block" : "none";
                    
                } catch (error) {
                    console.error("Erro ao carregar informações:", error);
                    document.getElementById("conteudoInformacoes").innerHTML = 
                        `<p class="text-center py-4 text-danger">Ocorreu um erro ao carregar as informações.</p>`;
                }
            };

            listarInformacoes(idFreelancer);

            const modal = new bootstrap.Modal(document.getElementById('modalInformacoes'));
            modal.show();
        }

        function contratarFreelancer() {
            if (!UserIdGlobal) return;
            
            // Preenche o campo hidden com o ID do freelancer
            var idFreelancerInputs = document.querySelectorAll('.idFreelancer');
            idFreelancerInputs.forEach(function(input) {
                input.value = UserIdGlobal;
            });

            // Fecha o modal de informações
            const infoModal = bootstrap.Modal.getInstance(document.getElementById('modalInformacoes'));
            infoModal.hide();
            
            // Abre o modal de vagas
            const vagasModal = new bootstrap.Modal(document.getElementById('vagasModal'));
            vagasModal.show();
        }

        async function filtrarFreelancer() {

            let html = '';
            let cargos = "";

            // Implemente a lógica de filtragem aqui
            var cargoId = document.getElementById('cargo').value;
            const response = await fetch('<?php echo base_url('/contratante/filtrarFreelancers?cargoId=') ?>' + cargoId);
            const data = await response.json();

            if(data.freelancers && data.freelancers.length > 0){
                

                data.freelancers.forEach((freelancers,indice)=>{
                    let html2 = '';

                    if(data.cargosFreelancer[indice] && data.cargosFreelancer[indice].length > 0){
                            data.cargosFreelancer[indice].forEach(cargos => {

                                html2 += `<span class="habilidade-badge">${cargos.cargo}</span>`;

                            })
                        }

                    html += `
                        <div class="freelancer-card">
                            <div class="freelancer-header">
                                <h3 class="freelancer-title">${freelancers.nome}</h3>
                            </div>
                            
                            <div class="freelancer-body">
                                <div class="freelancer-info">
                                    <i class="fas fa-briefcase"></i>
                                    <div>
                                        <div class="freelancer-label" id="cargosFreelancer">Habilidades</div>
                                        ${html2}
                                    </div>
                                </div>
                                
                                <div class="freelancer-info">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div>
                                        <div class="freelancer-label">Localização</div>
                                        <div class="freelancer-value">
                                            ${freelancers.cidade}, ${freelancers.estado}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="freelancer-info">
                                    <i class="fas fa-phone"></i>
                                    <div>
                                        <div class="freelancer-label">Contato</div>
                                        <div class="freelancer-value">${freelancers.telefone}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="freelancer-actions">
                                <a href="" target="_blank" class="btn-contato">
                                    <i class="fab fa-whatsapp"></i> WhatsApp
                                </a>

                                <button class="btn-contato" onclick="verInformacoes(${freelancers.id}, ${freelancers.user_id})">
                                    <i class="fas fa-info-circle"></i> Informações
                                </button>
                            </div>
                        </div>
                        `;

                });

                document.getElementById('listarFreelancers').innerHTML = html;
            }else if(data.freelancers.length == 0){
                document.getElementById('listarFreelancers').innerHTML = '';
            }

        }
    </script>

    <style>
        .vaga-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            transition: background-color 0.3s;
        }
        
        .vaga-item:last-child {
            border-bottom: none;
        }
        
        .vaga-item:hover {
            background-color: #f8f9fa;
        }
        
        .vaga-info h6 {
            color: #004182;
            margin-bottom: 5px;
        }
        
        .btn-close-white {
            filter: invert(1);
        }
        
        .modal-header {
            padding: 15px 20px;
        }
    </style>
</body>
</html>