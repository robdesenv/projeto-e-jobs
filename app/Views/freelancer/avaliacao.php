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
    </style>
</head>

<body>


    <?php include 'menuFreelancer.php'; ?>

    <div class="container">
        <div class="avaliacoes-section">
            <h1>Serviços para Avaliar</h1>

            <div class="services-list" id="servicesList">
                <!-- Exemplo -->
                <div class="service-card">
                    <div class="service-title"> Nome do evento</div>
                    <div class="service-client">Cliente: Robson</div>
                    <div class="service-client">Cargo: Garçom</div>
                    <div class="service-date">Finalizado em: 15/05/2025</div>
                    <button class="rate-btn" onclick="openModal('1')">
                        <i class="fas fa-star"></i> Avaliar Serviço
                    </button>
                </div>


                <div class="service-card">
                    <div class="service-title"> Nome do evento</div>
                    <div class="service-client">Cliente: Roobson</div>
                    <div class="service-client">Cargo: Motorista</div>
                    <div class="service-date">Finalizado em: 10/05/2025</div>
                    <button class="rate-btn" onclick="openModal('2')">
                        <i class="fas fa-star"></i> Avaliar Serviço
                    </button>
                </div>


                <div class="service-card">
                    <div class="service-title"> Nome do evento</div>
                    <div class="service-client">Cliente: Robson</div>
                    <div class="service-client">Cargo: Garçom</div>
                    <div class="service-date">Finalizado em: 05/05/2025</div>
                    <button class="rate-btn" onclick="openModal('3')">
                        <i class="fas fa-star"></i> Avaliar Serviço
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Avaliação -->
    <div id="ratingModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 style="color: #004182;">Avaliar empresa</h2>

            <form id="ratingForm">
                <input type="hidden" id="serviceId">

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
                            <input type="radio" id="communication1" name="communication" value="1">
                            <label for="communication1">1</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="communication2" name="communication" value="2">
                            <label for="communication2">2</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="communication3" name="communication" value="3">
                            <label for="communication3">3</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="communication4" name="communication" value="4">
                            <label for="communication4">4</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="communication5" name="communication" value="5">
                            <label for="communication5">5</label>
                        </div>
                    </div>
                </div>

                <div class="rating-section">
                    <div class="rating-title">Colaboradores</div>
                    <div class="rating-scale">
                        <span>0 (Péssimo)</span>
                        <span>5 (Excelente)</span>
                    </div>
                    <div class="rating-options">
                        <div class="rating-option">
                            <input type="radio" id="deadline1" name="deadline" value="1">
                            <label for="deadline1">1</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="deadline2" name="deadline" value="2">
                            <label for="deadline2">2</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="deadline3" name="deadline" value="3">
                            <label for="deadline3">3</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="deadline4" name="deadline" value="4">
                            <label for="deadline4">4</label>
                        </div>
                        <div class="rating-option">
                            <input type="radio" id="deadline5" name="deadline" value="5">
                            <label for="deadline5">5</label>
                        </div>

                    </div>
                </div>

                <div class="rating-section">
                    <label for="comment" class="rating-title">Comentário (opcional)</label>
                    <textarea id="comment" name="comment"
                        placeholder="Deixe seu comentário sobre o serviço..."></textarea>
                </div>

                <button type="button" class="publish-btn" onclick="publishRating()">
                    <i class="fas fa-check"></i> Publicar Avaliação
                </button>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Função para abrir o modal
        function openModal(serviceId) {
            document.getElementById('serviceId').value = serviceId;
            document.getElementById('ratingModal').style.display = 'block';

            // Limpar 
            document.getElementById('ratingForm').reset();
        }

        // Função para fechar
        function closeModal() {
            document.getElementById('ratingModal').style.display = 'none';
        }


        // Fechar o modal se clicar fora
        window.onclick = function (event) {
            const modal = document.getElementById('ratingModal');
            if (event.target == modal) {
                closeModal();
            }
        }

    </script>
</body>

</html>
<footer class="footer">
    <div class="container">
        <p>&copy; 2025 e-Jobs. Todos os direitos reservados.</p>
        <p><a href="#">Política de Privacidade</a> | <a href="#">Termos de Uso</a></p>
    </div>
</footer>