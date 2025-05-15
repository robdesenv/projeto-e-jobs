<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços - Freelancer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
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

    <!-- chamando o Menu no arquivo menuFreelancer -->
    <?php include 'menuFreelancer.php'; ?>

    <div class="container">
        <div class="servicos-section">
            <h1>Serviços candidatados por você</h1>

            <div class="servicos-container" id="listaServicos">
                <?php foreach ($contratados as $contratado):
                    if ($contratado['solicitante_id'] == user_id()):
                        ?>


                        <div class="servico-card">
                            <h3><?php echo htmlspecialchars($contratado['cargo']); ?></h3>
                            <p><strong>Evento:</strong> <?php echo htmlspecialchars($contratado['nome']); ?></p>
                            <p><strong>Endereço:</strong> <?php echo htmlspecialchars($contratado['endereco']); ?></p>
                            <p><strong>Cidade:</strong> <?php echo htmlspecialchars($contratado['cidade']); ?></p>
                            <p><strong>Data do evento:</strong> <?php echo htmlspecialchars($contratado['data']); ?></p>
                            <p><strong>Valor:</strong> R$ <?php echo htmlspecialchars($contratado['valor']); ?></p>
                            <p><strong>Descrição:</strong> <?php echo htmlspecialchars($contratado['descricao']); ?></p>
                            <?php if ($contratado['status'] == NULL) {
                                echo '<p class="alert alert-warning"><strong >Status: </strong>Agradando confirmação...</p>';
                            } elseif ($contratado['status'] == true) {
                                echo '<p class="alert alert-success"><strong >Status: </strong>Contratado</p>';
                            } elseif ($contratado['status'] == false) {
                                echo '<p class="alert alert-danger"><strong >Status: </strong>Recusado</p>';
                            }
                            ?>
                        </div>
                    <?php endif;
                endforeach; ?>
            </div>
        </div>

        <div class="servicos-section">
            <h1>Solicitações dos contratantes</h1>

            <div class="servicos-container" id="listaServicos">
                <?php foreach ($contratados as $contratado):
                    if ($contratado['solicitante_id'] != user_id()):
                        ?>


                        <div class="servico-card">
                            <h3><?php echo htmlspecialchars($contratado['cargo']); ?></h3>
                            <p><strong>Evento:</strong> <?php echo htmlspecialchars($contratado['nome']); ?></p>
                            <p><strong>Endereço:</strong> <?php echo htmlspecialchars($contratado['endereco']); ?></p>
                            <p><strong>Cidade:</strong> <?php echo htmlspecialchars($contratado['cidade']); ?></p>
                            <p><strong>Data do evento:</strong> <?php echo htmlspecialchars($contratado['data']); ?></p>
                            <p><strong>Valor:</strong> R$ <?php echo htmlspecialchars($contratado['valor']); ?></p>
                            <p><strong>Descrição:</strong> <?php echo htmlspecialchars($contratado['descricao']); ?></p>
                            <?php if ($contratado['status'] === NULL) {
                                echo '<p class="alert alert-warning"><strong >Status: </strong>Agradando confirmação...</p>';
                            } elseif ($contratado['status'] == true) {
                                echo '<p class="alert alert-success"><strong >Status: </strong>Contratado</p>';
                            } elseif ($contratado['status'] == false) {
                                echo '<p class="alert alert-danger"><strong >Status: </strong>Recusado</p>';
                            }
                            ?>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="btn-recusar" data-bs-dismiss="modal"
                                    onclick="recusarServico(<?php echo htmlspecialchars($contratado['id']); ?>)">Recusar</button>
                                <button type="button" name="btn-cargo" id="btn-contratar" class="btn btn-success"
                                    data-bs-dismiss="modal"
                                    onclick="aceitarServico(<?php echo htmlspecialchars($contratado['id']); ?>, <?php echo htmlspecialchars($contratado['evento_id']); ?>)">Aceitar</button>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
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
        let idVaga = null;

        function abrirModalAdicionar() {
            const modal = new bootstrap.Modal(document.getElementById('modalAdicionarServico'));
            modal.show();
        }

        async function aceitarServico(idServico, idEvento) {
            const response = await fetch('<?php echo base_url("/freelancer/servicosprestados?idVaga=") ?>' + idServico + "&idEvento=" + idEvento + "&btn=aceitar");
            const data = await response.json();
            console.log(data);
            window.location.reload();

        }

        async function recusarServico(idServico) {
            const response = await fetch('<?php echo base_url("/freelancer/servicosprestados?idVaga=") ?>' + idServico + "&btn=recusar");
            const data = await response.json();
            window.location.reload();

        }

        /* document.getElementById('btn-contratar').addEventListener('click', async function() {
        if (idVaga) {
            try {
                
            } catch (error) {
                console.error('Erro na requisição:', error);
            }
        }

        });*/


    </script>
</body>

</html>