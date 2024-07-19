<!DOCTYPE html>
<html>

<head>
	<title>Reporte Financiero</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		h1 {
			text-align: center;
			margin-top: 20px;
		}

		p {
			text-align: center;
			margin: 0;
			padding: 0;
		}

		.container {
			width: 90%;
			margin: 0 auto;
			padding: 20px;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}

		th,
		td {
			padding: 12px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		th {
			background-color: #f4f4f4;
			color: #333;
			font-weight: bold;
		}

		tr:hover {
			background-color: #f1f1f1;
		}

		.footer {
			margin-top: 20px;
			font-weight: bold;
		}

		.footer td {
			border-top: 2px solid #333;
			background-color: rgb(237 233 254);
		}
	</style>
</head>

<body>
	<h1>Reporte Financiero</h1>
	<p>Desde: {{ $fecha_inicio }} Hasta: {{ $fecha_final }}</p>
	<div class="container">
		<table>
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Propina</th>
					<th>Efectivo</th>
					<th>Yappy</th>
					<th>Visa</th>
					<th>Mastercard</th>
					<th>Descuento Productos</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($totalesDiarios as $fecha => $totales)
				<tr>
					<td>{{ $fecha }}</td>
					<td>$ {{ $totales['propina'] }}</td>
					<td>$ {{ $totales['efectivo'] }}</td>
					<td>$ {{ $totales['yappy'] }}</td>
					<td>$ {{ $totales['visa'] }}</td>
					<td>$ {{ $totales['mastercard'] }}</td>
					<td>$ {{ $totales['descuento_productos'] }}</td>
					<td>$ {{ $totales['total'] }}</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot class="footer">
				<tr>
					<td>Totales</td>
					<td>$ {{ $totalesAcumulados['propina'] }}</td>
					<td>$ {{ $totalesAcumulados['efectivo'] }}</td>
					<td>$ {{ $totalesAcumulados['yappy'] }}</td>
					<td>$ {{ $totalesAcumulados['visa'] }}</td>
					<td>$ {{ $totalesAcumulados['mastercard'] }}</td>
					<td>$ {{ $totalesAcumulados['descuento_productos'] }}</td>
					<td>$ {{ $totalesAcumulados['total'] }}</td>
				</tr>
			</tfoot>
		</table>
	</div>
</body>

</html>