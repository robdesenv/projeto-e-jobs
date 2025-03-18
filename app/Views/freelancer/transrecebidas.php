<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferências Recebidas - Freelancer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.24/jspdf.plugin.autotable.min.js"></script>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #004182;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
            color: #ffffff;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            font-size: 16px;
            margin-right: 20px;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #0a66c2;
        }

        .transferencias-section {
            padding: 50px 0;
            background-color: #ffffff;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .transferencias-section h1 {
            color: #004182;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .transferencias-section .btn-exportar {
            background-color: #004182;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
            margin-right: 10px;
        }

        .transferencias-section .btn-exportar:hover {
            background-color: #0a66c2;
        }

        .transferencias-section table {
            width: 100%;
            border-collapse: collapse;
        }

        .transferencias-section table th,
        .transferencias-section table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .transferencias-section table th {
            background-color: #004182;
            color: #ffffff;
        }

        .transferencias-section table tr:hover {
            background-color: #f1f1f1;
        }

        .transferencias-section .status {
            font-weight: bold;
        }

        .transferencias-section .status.recebido {
            color: #28a745; 
        }

        .transferencias-section .status.pendente {
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

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index">e-Jobs</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="meucurriculo"><i class="fas fa-file-alt"></i> Meu
                            currículo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="servicosprestados"><i class="fas fa-tasks"></i> Serviços
                            prestados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transrecebidas"><i class="fa-dollar-sign"></i>
                            Transferências recebidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="telabusca"><i class="fas fa-search"></i> Buscar
                            serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-logout" href="/projeto-e-jobs/public/index.php/logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="transferencias-section">
            <h1>Transferências Recebidas</h1>
            <button class="btn-exportar" onclick="exportarParaPDF()">
                <i class="fas fa-file-pdf"></i> Exportar para PDF
            </button>

            <!-- Tabela de Transferências Recebidas -->
            <table id="tabelaTransferencias">
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Valor</th>
                        <th>Data</th>
                        <th>Método de Pagamento</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemplo pra mostrar -->
                    <tr>
                        <td>Empresa A</td>
                        <td>R$ 1.500,00</td>
                        <td>10/10/2023</td>
                        <td>PIX</td>
                        <td class="status recebido">Recebido</td>
                    </tr>
                    <tr>
                        <td>Empresa B</td>
                        <td>R$ 2.000,00</td>
                        <td>15/10/2023</td>
                        <td>TED</td>
                        <td class="status pendente">Pendente</td>
                    </tr>
                    <tr>
                        <td>Empresa C</td>
                        <td>R$ 3.000,00</td>
                        <td>20/10/2023</td>
                        <td>Boleto</td>
                        <td class="status recebido">Recebido</td>
                    </tr>
                </tbody>
            </table>
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

        // PDF
        function exportarParaPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            doc.setFontSize(18);
            doc.text("Transferências Recebidas", 14, 15);

            doc.autoTable({
                html: '#tabelaTransferencias',
                startY: 20,
                theme: 'grid',
                styles: {
                    fontSize: 10,
                    cellPadding: 2,
                },
                headStyles: {
                    fillColor: [0, 65, 130],
                    textColor: [255, 255, 255],
                },
            });

            doc.save('transferencias_recebidas.pdf');
        }
    </script>
</body>

</html>