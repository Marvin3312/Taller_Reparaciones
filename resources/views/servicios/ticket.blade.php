<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ticket de Servicio</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            font-size: 12px;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .details, .content {
            width: 100%;
            margin-bottom: 20px;
        }
        .details table, .content table {
            width: 100%;
            border-collapse: collapse;
        }
        .details th, .details td, .content th, .content td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .details th {
            text-align: left;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            {{-- <img src="path/to/your/logo.png" alt="Logo" width="150"> --}}
            <h1>Ticket de Servicio #{{ $servicio['id_servicio'] }}</h1>
        </div>

        <div class="details">
            <table>
                <tr>
                    <th>Fecha de Recepción</th>
                    <td>{{ $servicio['fecha_recepcion'] }}</td>
                </tr>
                <tr>
                    <th>Equipo</th>
                    <td>{{ $servicio['equipo']['marca']['nombre'] ?? '' }} {{ $servicio['equipo']['modelo'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Número de Serie</th>
                    <td>{{ $servicio['equipo']['num_serie'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Técnico Asignado</th>
                    <td>{{ $servicio['tecnico']['nombre'] ?? 'N/A' }}</td>
                </tr>
            </table>
        </div>

        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>Diagnóstico / Problema Reportado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $servicio['diagnostico'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p><strong>Firma del Cliente:</strong> _________________________</p>
            <p>Gracias por su confianza.</p>
        </div>
    </div>
</body>
</html>
