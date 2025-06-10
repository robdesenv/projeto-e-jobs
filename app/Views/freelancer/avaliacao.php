<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliações - Freelancer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .avaliacoes-section {
            padding: 50px 0;
            background-color: #ffffff;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .avaliacoes-section h1 {
            color: #004182;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .services-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .service-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s ease;
            border: 1px solid #ddd;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .service-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #004182;
        }

        .service-client {
            color: #6c757d;
            margin-bottom: 15px;
        }

        .service-date {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 15px;
        }

        .rate-btn {
            background-color: #004182;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s;
        }

        .rate-btn:hover {
            background-color: #0a66c2;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1050;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 500px;
            border: none;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #004182;
        }

        .rating-section {
            margin-bottom: 20px;
        }

        .rating-title {
            font-weight: bold;
            margin-bottom: 10px;
            color: #004182;
        }

        .rating-scale {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            color: #6c757d;
        }

        .rating-options {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .rating-option {
            text-align: center;
        }

        .rating-option input {
            margin-bottom: 5px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
            min-height: 100px;
            margin-bottom: 20px;
            font-family: inherit;
        }

        .publish-btn {
            background-color: #004182;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s;
        }

        .publish-btn:hover {
            background-color: #0a66c2;
        }

        .no-services {
            text-align: center;
            color: #6c757d;
            font-style: italic;
            padding: 40px 0;
            grid-column: 1 / -1;
        }

        .footer {
            text-align: center;
            padding: 20px;
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
        }

        /* Estilo para os alertas (notificações) */
        .alert-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1100;
            min-width: 300px;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
            color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            animation: slideIn 0.5s forwards;
        }

        .alert-notification.success {
            background-color: #28a745;
        }

        .alert-notification.error {
            background-color: #dc3545;
        }

        .alert-notification.info {
            background-color: #17a2b8;
        }

        .alert-notification.warning {
            background-color: #ffc107;
            color: #212529;
        }

        .alert-notification .close {
            color: inherit;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            opacity: 0.8;
            transition: opacity 0.3s;
            line-height: 1;
            padding: 0;
            margin-left: 15px;
        }

        .alert-notification .close:hover {
            opacity: 1;
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

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            .alert-notification {
                min-width: calc(100% - 40px);
                max-width: calc(100% - 40px);
                right: 20px;
                left: 20px;
            }
        }
    </style>
</head>

<body>

    <?php include 'menuFreelancer.php'; ?>

    <div class="container">
        <div class="avaliacoes-section">
            <h1>Contratantes para Avaliar</h1>

            <div class="services-list" id="servicesList">
                <?php foreach ($avaliacao as $avaliacoes): ?>
                    <div class="service-card">
                        <div class="service-title"> Contratante: <?php echo $avaliacoes['contratante'] ?></div>
                        <div class="service-client">Evento: <?php echo $avaliacoes['evento'] ?></div>
                        <div class="service-client">Cargo Trabalhado: <?php echo $avaliacoes['cargo'] ?></div>
                        <div class="service-date">Finalizado em: <?php echo $avaliacoes['finalizado_em'] ?></div>
                        <button class="rate-btn"
                            onclick="openModal(<?php echo $avaliacoes['user_id'] ?>,<?php echo $avaliacoes['id'] ?>)">
                            <i class="fas fa-star"></i> Avaliar Serviço
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Modal de Avaliação -->
    <div id="ratingModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 style="color: #004182;">Avaliar contratante</h2>

            <form id="ratingForm" method="post">
                <input type="hidden" id="eventoId" name="eventoId">
                <input type="hidden" id="contratanteId" name="contratanteId">

                <div class="rating-section">
                    <div class="rating-title">Qualidade do Serviço</div>
                    <div class="rating-scale">
                        <span>0 (Péssimo)</span>
                        <span>5 (Excelente)</span>
                    </div>
                    <div class="rating-options">
                        <div class="rating-option">
                            <input type="radio" id="quality1" name="quality" value="1">
                            <label for="quality1">1</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="quality2" name="quality" value="2">
                            <label for="quality2">2</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="quality3" name="quality" value="3">
                            <label for="quality3">3</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="quality4" name="quality" value="4">
                            <label for="quality4">4</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="quality5" name="quality" value="5">
                            <label for="quality5">5</label>
                        </div>
                    </div>
                </div>

                <div class="rating-section">
                    <div class="rating-title">Ambiente</div>
                    <div class="rating-scale">
                        <span>0 (Péssimo)</span>
                        <span>5 (Excelente)</span>
                    </div>
                    <div class="rating-options">
                        <div class="rating-option">
                            <input type="radio" id="ambiente1" name="ambiente" value="1">
                            <label for="ambiente1">1</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="ambiente2" name="ambiente" value="2">
                            <label for="ambiente2">2</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="ambiente3" name="ambiente" value="3">
                            <label for="ambiente3">3</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="ambiente4" name="ambiente" value="4">
                            <label for="ambiente4">4</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="ambiente5" name="ambiente" value="5">
                            <label for="ambiente5">5</label>
                        </div>
                    </div>
                </div>

                <div class="rating-section">
                    <label for="comment" class="rating-title">Comentário (opcional)</label>
                    <textarea id="comment" name="comment"
                        placeholder="Deixe seu comentário sobre o serviço..."></textarea>
                </div>

                <button type="submit" class="publish-btn">
                    <i class="fas fa-check"></i> Publicar Avaliação
                </button>
            </form>
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
        // Função para mostrar alertas
        function showAlert(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `alert-notification ${type}`;
            notification.innerHTML = `
                <span>${message}</span>
                <button class="close">&times;</button>
            `;

            document.body.appendChild(notification);

            notification.querySelector('.close').addEventListener('click', () => {
                closeNotification(notification);
            });

            setTimeout(() => {
                closeNotification(notification);
            }, 5000);
        }

        function closeNotification(notification) {
            notification.style.animation = 'slideOut 0.5s forwards';
            notification.addEventListener('animationend', () => {
                notification.remove();
            });
        }

        function openModal(contratanteId, eventoId) {
            document.getElementById('eventoId').value = eventoId;
            document.getElementById('contratanteId').value = contratanteId;
            document.getElementById('ratingModal').style.display = 'block';

            document.getElementById('ratingForm').reset();
        }

        function closeModal() {
            document.getElementById('ratingModal').style.display = 'none';
        }
        window.onclick = function (event) {
            const modal = document.getElementById('ratingModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        <?php if (session()->getFlashdata('msg')): ?>
            window.addEventListener('DOMContentLoaded', () => {
                showAlert(`<?= addslashes(session()->getFlashdata('msg')) ?>`, 'error');
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('msg-success')): ?>
            window.addEventListener('DOMContentLoaded', () => {
                showAlert(`<?= addslashes(session()->getFlashdata('msg-success')) ?>`, 'success');
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('msg-info')): ?>
            window.addEventListener('DOMContentLoaded', () => {
                showAlert(`<?= addslashes(session()->getFlashdata('msg-info')) ?>`, 'info');
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('msg-warning')): ?>
            window.addEventListener('DOMContentLoaded', () => {
                showAlert(`<?= addslashes(session()->getFlashdata('msg-warning')) ?>`, 'warning');
            });
        <?php endif; ?>

        document.getElementById('ratingForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const qualitySelected = document.querySelector('input[name="quality"]:checked');
            const ambienteSelected = document.querySelector('input[name="ambiente"]:checked');

            if (!qualitySelected || !ambienteSelected) {
                showAlert('Por favor, avalie todos os critérios antes de enviar.', 'warning');
                return;
            }

            const formData = new FormData(this);

            fetch(window.location.href, {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showAlert(data.message, 'success');
                        closeModal();
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    } else {
                        showAlert(data.message, 'error');
                    }
                })
                .catch(error => {
                    showAlert('Ocorreu um erro ao enviar a avaliação.', 'error');
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>