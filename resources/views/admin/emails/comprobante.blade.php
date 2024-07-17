<!DOCTYPE html>
<html>
<head>
    <title>Comprobante</title>
</head>
<body>
    <p>Hola,</p>
    <p>Adjunto encontrarás tu comprobante de pago. Aquí tienes los detalles:</p>
    <ul>
        <li><strong>Nombre de la Trabajadora:</strong> {{ $data['nombreTrabajadora'] }}</li>
        <li><strong>Monto del Servicio:</strong> {{ $data['montoServicio'] }}</li>
        <li><strong>ITBMS:</strong> {{ $data['itbms'] }}</li>
        <li><strong>Total de la Transacción:</strong> {{ $data['montoTotal'] }}</li>
    </ul>
    <p>Saludos,</p>
    <p>{{ config('app.name') }}</p>
</body>
</html>
