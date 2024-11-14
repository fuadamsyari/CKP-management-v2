<!-- View: laporan_service_pdf.php -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Laporan Service PDF</title>
	<style>
		table {
			width: 100%;
			border-collapse: collapse;
		}

		table,
		th,
		td {
			border: 1px solid black;
			padding: 8px;
			text-align: left;
		}

		th {
			background-color: #f2f2f2;
		}
	</style>
</head>

<body>
	<h2>Laporan Service Bulan <?= ucfirst($bulan['bulan']) ?></h2>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Tanggal</th>
				<th>Customer</th>
				<th>Alamat</th>
				<th>Barang</th>
				<th>Non-Stock</th>
				<th>Nominal NS</th>
				<th>Harga Jual</th>
				<th>Gross Profit</th>
				<th>Ket</th>
				<th>Nota</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1;
			foreach ($services as $s) : ?>
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $s['tanggal'] ?></td>
					<td><?= $s['customer'] ?></td>
					<td><?= $s['alamat'] ?></td>
					<td><?= $s['barang'] ?></td>
					<td><?= $s['blb'] ?></td>
					<td><?= number_format($s['nominal_blb'], 0, ',', ',') ?></td>
					<td><?= number_format($s['harga_jual'], 0, ',', ',') ?></td>
					<td><?= number_format($s['laba'], 0, ',', ',') ?></td>
					<td><?= $s['ket'] ?></td>
					<td><?= number_format($s['nota'], 0, ',', ',') ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="6">Total</th>
				<th><?= number_format($total['nominal_blb'], 0, ',', ',') ?></th>
				<th><?= number_format($total['harga_jual'], 0, ',', ',') ?></th>
				<th><?= number_format($total['laba'], 0, ',', ',') ?></th>
				<th colspan="2"></th>
			</tr>
		</tfoot>
	</table>
</body>

</html>