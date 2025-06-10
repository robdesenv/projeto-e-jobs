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
            margin-bottom: 10px;
        }

        .btn-candidatar:hover {
            background-color: var(--secondary);
        }

        .btn-candidatar.disabled {
            background-color: var(--disabled);
            cursor: not-allowed;
            opacity: 1;
        }

        .btn-informacoes {
            background-color: var(--primary);
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-informacoes:hover {
            background-color: var(--secondary);
        }

        .modal-info-header {
            background-color: var(--primary);
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-info-title {
            margin: 0;
            font-size: 1.4rem;
            font-weight: 600;
        }

        .btn-close-white {
            filter: invert(1);
            width: 20px;
            height: 20px;
            padding: 4px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }

        .btn-close-white:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: 1px solid #eee;
            padding: 15px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            background-color: #f9f9f9;
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

        .freelancer-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e0e0e0;
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

        .rating {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .rating i {
            color: #ffd700;
            font-size: 1rem;
        }

        .rating .fa-star-half-alt {
            color: #ffd700;
        }

        .rating .fa-star.empty {
            color: #ccc;
        }

        .rating-text {
            color: #555;
            font-size: 0.9rem;
            margin-left: 5px;
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

        html,
        body {
            height: 100%;
            /* Ensure the html and body take up the full height */
            margin: 0;
            /* Remove default margins */
        }

        body {
            display: flex;
            flex-direction: column;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            flex: 1 0 auto;
            /* Allow the container to grow and take available space */
        }

        .footer {
            flex-shrink: 0;
            /* Prevent the footer from shrinking */
            text-align: center;
            padding: 25px;
            background-color: #004182;
            color: #ffffff;
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
                                <?php foreach ($cargos as $cargo): ?>
                                    <option value="<?php echo $cargo['id'] ?>"><?php echo $cargo['cargo'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="localizacao">Localização(Cidade):</label>
                            <input type="text" id="localizacao" class="form-control" placeholder="Digite a cidade">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> </label>
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
                    ?>
                    <div class="servico-card" data-categoria="<?php echo $vaga['cargo_id']; ?>"
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
                        <button class="btn-candidatar"
                            onclick="candidatarServico(<?php echo $vaga['id']; ?>, <?php echo $vaga['evento_id']; ?>, this)">
                            <i class="fas fa-paper-plane"></i> Candidatar-se
                        </button>
                        <button class="btn-informacoes" onclick="verInformacoes(<?php echo $vaga['user_id']; ?>)">
                            <i class="fas fa-info-circle"></i> Ver Informações
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalInformacoes" tabindex="-1" aria-labelledby="modalInformacoesLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-info-header">
                    <h5 class="modal-info-title"><i class="fas fa-info-circle"></i> Informações do Contratante</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="freelancer-card">
                        <div class="freelancer-header">
                            <h3 class="freelancer-title" id="modalNome"></h3>
                        </div>
                        <div class="freelancer-body">
                            <div class="freelancer-info" id="modalLocalizacao">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <div class="freelancer-label">Localização</div>
                                    <div class="freelancer-value" id="modalLocalizacaoValue"></div>
                                </div>
                            </div>
                            <div class="freelancer-info" id="modalTelefone">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <div class="freelancer-label">Telefone</div>
                                    <div class="freelancer-value" id="modalTelefoneValue"></div>
                                </div>
                            </div>
                            <div class="freelancer-info" id="modalEmail">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <div class="freelancer-label">E-mail</div>
                                    <div class="freelancer-value" id="modalEmailValue"></div>
                                </div>
                            </div>
                            <div class="freelancer-info" id="modalDataNasc">
                                <i class="fas fa-birthday-cake"></i>
                                <div>
                                    <div class="freelancer-label">Data de Nascimento</div>
                                    <div class="freelancer-value" id="modalDataNascValue"></div>
                                </div>
                            </div>
                            <div class="freelancer-info" id="modalAvaliacao">
                                <i class="fas fa-star"></i>
                                <div>
                                    <div class="freelancer-label">Avaliação</div>
                                    <div class="freelancer-value rating" id="modalAvaliacaoValue"></div>
                                </div>
                            </div>
                            <div class="freelancer-info" id="modalComentarios">
                                <div>
                                    <div class="freelancer-label">Comentários</div>
                                    <div class="freelancer-value" id="modalComentariosValue"></div>
                                </div>
                            </div>
                        </div>
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
            <p>© 2025 e-Jobs. Todos os direitos reservados.</p>
            <p><a href="#">Política de Privacidade</a> | <a href="#">Termos de Uso</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function desativarBotoesJaCandidatados() {
            const candidaturas = JSON.parse(localStorage.getItem('candidaturas')) || [];
            candidaturas.forEach(idVaga => {
                const btn = document.querySelector(`.servico-card[data-vaga-id="${idVaga}"] .btn-candidatar`);
                if (btn) {
                    btn.innerHTML = '<i class="fas fa-check"></i> Candidatura enviada';
                    btn.classList.add('disabled');
                    btn.disabled = true;
                }
            });
        }

        async function verInformacoes(UserId) {
            try {
                const response = await fetch('<?php echo base_url("/freelancer/exibirInformacoesContratante?idContratante=") ?>' + UserId);
                const data = await response.json();

                if (data.contratante && data.contratante.length > 0) {
                    const info = data.contratante[0];

                    let media = -1;
                    if (data.media_avaliacao[0] && data.media_avaliacao[0].length > 0 && data.media_avaliacao[0][0].avaliacao_media != null) {
                        media = Number(data.media_avaliacao[0][0].avaliacao_media);
                    }

                    const rating = media;
                    const fullStars = Math.floor(rating);
                    const decimalPart = rating - fullStars;
                    const halfStar = decimalPart >= 0.5 ? 1 : 0;
                    const emptyStars = 5 - fullStars - halfStar;

                    console.log(`Rating: ${rating}, Full Stars: ${fullStars}, Half Star: ${halfStar}, Empty Stars: ${emptyStars}`);

                    let ratingHtml = '';
                    if (rating >= 0) {
                        for (let i = 0; i < fullStars; i++) {
                            ratingHtml += `<i class="fas fa-star"></i>`;
                        }
                        if (halfStar) {
                            ratingHtml += `<i class="fas fa-star-half-alt"></i>`;
                        }
                        for (let i = 0; i < emptyStars; i++) {
                            ratingHtml += `<i class="fas fa-star empty"></i>`;
                        }
                        ratingHtml += `<span class="rating-text">(${rating.toFixed(1)})</span>`;
                    } else {
                        ratingHtml += `<span>Nenhuma Avaliação Encontrada</span>`;
                    }

                    document.getElementById("modalNome").textContent = info.nome;
                    document.getElementById("modalLocalizacaoValue").textContent = `${info.cidade}, ${info.estado}`;
                    document.getElementById("modalTelefoneValue").textContent = info.telefone;
                    document.getElementById("modalEmailValue").textContent = info.email;
                    document.getElementById("modalDataNascValue").textContent = info.data_nasc;
                    document.getElementById("modalAvaliacaoValue").innerHTML = ratingHtml;

                    const comentariosHtml = data.comentarios[0] && data.comentarios[0].length > 0
                        ? data.comentarios[0].map(comentario => `<p>${comentario.comentario}</p>`).join('<hr>')
                        : `<p>Nenhum comentário encontrado</p>`;
                    document.getElementById("modalComentariosValue").innerHTML = comentariosHtml;
                } else {
                    document.getElementById("modalNome").textContent = "Contratante Desconhecido";
                    document.getElementById("modalLocalizacaoValue").textContent = "";
                    document.getElementById("modalTelefoneValue").textContent = "";
                    document.getElementById("modalEmailValue").textContent = "";
                    document.getElementById("modalDataNascValue").textContent = "";
                    document.getElementById("modalAvaliacaoValue").innerHTML = `<span>Nenhuma Avaliação Encontrada</span>`;
                    document.getElementById("modalComentariosValue").innerHTML = `<p>Nenhuma informação encontrada para este contratante.</p>`;
                }

                const modal = new bootstrap.Modal(document.getElementById('modalInformacoes'));
                modal.show();
            } catch (error) {
                console.error("Erro ao carregar informações:", error);
                document.getElementById("modalNome").textContent = "Erro";
                document.getElementById("modalLocalizacaoValue").textContent = "";
                document.getElementById("modalTelefoneValue").textContent = "";
                document.getElementById("modalEmailValue").textContent = "";
                document.getElementById("modalDataNascValue").textContent = "";
                document.getElementById("modalAvaliacaoValue").innerHTML = `<span>Nenhuma Avaliação Encontrada</span>`;
                document.getElementById("modalComentariosValue").innerHTML = `<p>Ocorreu um erro ao carregar as informações.</p>`;

                const modal = new bootstrap.Modal(document.getElementById('modalInformacoes'));
                modal.show();
            }
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
                    btn.innerHTML = '<i class="fas fa-check"></i> Candidatura enviada';
                    btn.classList.add('disabled');
                    btn.disabled = true;

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

        document.addEventListener('DOMContentLoaded', function () {
            desativarBotoesJaCandidatados();

            const urlParams = new URLSearchParams(window.location.search);
            const categoriaParam = urlParams.get('categoria');
            const localizacaoParam = urlParams.get('localizacao');

            if (categoriaParam) document.getElementById('categoria').value = categoriaParam;
            if (localizacaoParam) document.getElementById('localizacao').value = localizacaoParam;
            if (categoriaParam || localizacaoParam) filtrarServicos();

            document.getElementById('localizacao').addEventListener('input', filtrarServicos);
            document.getElementById('categoria').addEventListener('change', filtrarServicos);
        });
    </script>

</body>

</html>