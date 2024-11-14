<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Laporan Belanja Bulan <?= ucfirst($bulan['bulan']) ?></title>
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
	<h2>Laporan Belanja Bulan <?= ucfirst($bulan['bulan']) ?></h2>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Tanggal</th>
				<th>Belanja Bulanan</th>
				<th>Belanja Parts</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1;
			foreach ($belanja as $b) : ?>
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $b['tanggal'] ?></td>
					<td><?= number_format($b['belanja_1'], 0, ',', ',') ?></td>
					<td><?= number_format($b['belanja_2'], 0, ',', ',') ?></td>
					<td><?= $b['ket'] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="2">Total</th>
				<th><?= number_format($total['belanja_1'], 0, ',', ',') ?></th>
				<th><?= number_format($total['belanja_2'], 0, ',', ',') ?></th>
				<th></th>
			</tr>
		</tfoot>
	</table>
</body>

</html>