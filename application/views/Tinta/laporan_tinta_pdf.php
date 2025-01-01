<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Laporan Penjualan Tinta Bulan <?= ucfirst($bulan['bulan']) ?></title>
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
	<h2>Laporan Penjualan Tinta Bulan <?= ucfirst($bulan['bulan']) ?></h2>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Tanggal</th>
				<th>Warna</th>
				<th>Tinta</th>
				<th>Sale Price</th>
				<th>Unit Cost</th>
				<th>Gross Profit</th>
				<th>Customer</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1;
			foreach ($tinta as $t) : ?>
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $t['tanggal'] ?></td>
					<td><?= $t['warna'] ?></td>
					<td><?= $t['tinta'] ?></td>
					<td><?= number_format($t['terjual'] ?? 0, 0, ',', ',') ?></td>
					<td><?= number_format($t['modal'] ?? 0, 0, ',', ',') ?></td>
					<td><?= number_format($t['untung'] ?? 0, 0, ',', ',') ?></td>
					<td><?= $t['customer'] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">Total</th>
				<th><?= number_format($total['terjual'] ?? 0, 0, ',', ',') ?></th>
				<th><?= number_format($total['modal'] ?? 0, 0, ',', ',') ?></th>
				<th><?= number_format($total['untung'] ?? 0, 0, ',', ',') ?></th>
				<th></th>
			</tr>
		</tfoot>
	</table>
</body>

</html>