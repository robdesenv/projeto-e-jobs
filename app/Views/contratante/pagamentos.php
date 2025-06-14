<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferências Feitas - Contratante</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.24/jspdf.plugin.autotable.min.js"></script>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .transferencias-section {
            padding: 50px 0;
            background-color: #ffffff;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
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

    <!-- chamando o Menu no arquivo menuFreelancer -->
    <?php include 'menuContratante.php'; ?>

    <div class="container">
        <div class="transferencias-section">
            <h1>Transferências feitas</h1>
            <button class="btn-exportar" onclick="exportarParaPDF()">
                <i class="fas fa-file-pdf"></i> Exportar para PDF
            </button>

            <!-- Tabela de Transferências feitas -->
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
                        <td>Free A</td>
                        <td>R$ 150,00</td>
                        <td>10/10/2023</td>
                        <td>PIX</td>
                        <td class="status recebido">Pago</td>
                    </tr>
                    <tr>
                        <td>Free B</td>
                        <td>R$ 200,00</td>
                        <td>15/10/2023</td>
                        <td> </td>
                        <td class="status pendente">Pendente</td>
                    </tr>
                    <tr>
                        <td>Free C</td>
                        <td>R$ 300,00</td>
                        <td>20/10/2023</td>
                        <td>PIX</td>
                        <td class="status recebido">Pago</td>
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

            doc.save('transferencias_feitas.pdf');
        }
    </script>
</body>

</html>