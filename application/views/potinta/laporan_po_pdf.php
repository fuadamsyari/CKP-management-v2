<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Laporan Pre Order Tinta - <?= $po_list['po_ke'] ?></title>
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
	<h2>Laporan Pre Order - <?= $po_list['po_ke'] ?></h2>
	<p>Tanggal PO: <?= $po_list['tgl_po'] ?></p>

	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Warna</th>
				<th>Tinta</th>
				<th>Harga</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1;
			foreach ($tinta as $s): ?>
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $s['warna'] ?></td>
					<td><?= $s['tinta'] ?></td>
					<td><?= number_format($s['modal'] ?? 0, 0, ',', ',') ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="3">Total</th>
				<th><?= number_format($total['modal'] ?? 0, 0, ',', ',') ?></th>
			</tr>
		</tfoot>
	</table>
</body>

</html>