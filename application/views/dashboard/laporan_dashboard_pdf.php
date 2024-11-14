<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Laporan Dashboard PDF</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 20px;
			color: #333;
		}

		h2 {
			color: #444;
			font-size: 24px;
		}

		.section {
			margin-top: 30px;
		}

		.section-title {
			background-color: #007bff;
			color: white;
			padding: 10px;
			font-size: 18px;
			margin-bottom: 10px;
			text-align: center;
			border-radius: 5px;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
			background: linear-gradient(to bottom, #e0f7fa, #ffffff);
			/* Gradasi biru pastel ke putih */
			border-radius: 5px;
			overflow: hidden;
		}

		th,
		td {
			border: 1px solid #ddd;
			padding: 10px;
		}

		th {
			background-color: #f8f9fa;
			text-align: left;
			color: #555;
		}

		td {
			text-align: right;
		}

		.total {
			font-weight: bold;
			background-color: #f0f8ff;
		}

		.summary {
			font-size: 16px;
			font-weight: bold;
			color: #444;
			text-align: right;
			margin-top: 10px;
		}

		.highlight {
			color: #007bff;
			font-weight: bold;
		}
	</style>
</head>

<body>
	<h2>Laporan Keuangan Bulanan - <?= ucfirst($nama_bulan['bulan']) ?> <?= $nama_tahun['tahun'] ?></h2>

	<div class="section">
		<div class="section-title">1. Pendapatan & Biaya Service</div>
		<table>
			<tr>
				<th>Revenue</th>
				<td>Rp <?= number_format($service['harga_jual'], 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Cost</th>
				<td>Rp <?= number_format($service['nominal_blb'], 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Profit</th>
				<td class="highlight">Rp <?= number_format($service['laba'], 0, ',', ',') ?></td>
			</tr>
		</table>
	</div>

	<div class="section">
		<div class="section-title">2. Pendapatan & Biaya Tinta</div>
		<table>
			<tr>
				<th>Revenue</th>
				<td>Rp <?= number_format($tinta['terjual'], 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Cost</th>
				<td>Rp <?= number_format($tinta['modal'], 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Profit</th>
				<td class="highlight">Rp <?= number_format($tinta['untung'], 0, ',', ',') ?></td>
			</tr>
		</table>
	</div>

	<div class="section">
		<div class="section-title">3. Kasbon Karyawan</div>
		<table>
			<tr>
				<th>Employee A</th>
				<td>Rp <?= number_format($kasbon['fuad']['kasbon'], 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Employee B</th>
				<td>Rp <?= number_format($kasbon['other']['kasbon'], 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Total Cash Advance</th>
				<td class="highlight">Rp <?= number_format($total_kasbon['kasbon'], 0, ',', ',') ?></td>
			</tr>
		</table>
	</div>

	<div class="section">
		<div class="section-title">4. Biaya Gaji & Sisa Saldo</div>
		<table>
			<tr>
				<th>Employee A</th>
				<td>Rp <?= number_format($gaji, 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Employee B</th>
				<td>Rp <?= number_format($kuliah, 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Remaining Balance</th>
				<td class="highlight">Rp <?= number_format(($sisa_saldo['nominal'] + $service['harga_jual'] + $tinta['untung']) - ($total_kasbon['kasbon'] + ($belanja['belanja_1'] + $belanja['belanja_2'])) - ($gaji + $kuliah), 0, ',', ',') ?></td>
			</tr>
		</table>
	</div>

	<div class="section">
		<div class="section-title">5. Cash Flow</div>
		<table>
			<tr>
				<th>Opening Balance</th>
				<td>Rp <?= number_format($sisa_saldo['nominal'], 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Profit (Service)</th>
				<td>Rp <?= number_format($service['laba'], 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Revenue (Tinta)</th>
				<td>Rp <?= number_format($tinta['terjual'], 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Cash Advance</th>
				<td>Rp <?= number_format($total_kasbon['kasbon'], 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Non-Salary Expenses</th>
				<td>Rp <?= number_format(($belanja['belanja_1'] + $belanja['belanja_2']), 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Balance</th>
				<td class="highlight">Rp <?= number_format((($sisa_saldo['nominal'] + $service['laba'] + $tinta['terjual']) - ($total_kasbon['kasbon'] + ($belanja['belanja_1'] + $belanja['belanja_2']))), 0, ',', ',') ?></td>
			</tr>
		</table>
	</div>

	<div class="section">
		<div class="section-title">6. Manajemen Kas</div>
		<table>
			<tr>
				<th>Bank</th>
				<td>Rp <?= number_format($ATM['nominal'], 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Cash</th>
				<td>Rp <?= number_format($Cash['nominal'], 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Total</th>
				<td class="highlight">Rp <?= number_format(($ATM['nominal'] + $Cash['nominal']), 0, ',', ',') ?></td>
			</tr>
			<tr>
				<th>Reconciliation</th>
				<td class="highlight text-danger">Rp <?= number_format(((($sisa_saldo['nominal'] + $service['laba'] + $tinta['terjual']) - ($total_kasbon['kasbon'] + ($belanja['belanja_1'] + $belanja['belanja_2'])) - ($ATM['nominal'] + $Cash['nominal'])) * -1), 0, ',', ',') ?></td>
			</tr>
		</table>
	</div>
</body>

</html>
