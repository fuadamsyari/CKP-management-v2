<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-1">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		<form action="<?= base_url('dashboard/ubahbulan') ?>" method="post" id="ubahbulan">
			<div class="input-group input-group-sm mb-3">
				<div class="input-group-prepend">
					<input type="submit" value="Ubah" class="text-dark btn btn-sm btn-warning" id="inputGroup-sizing-sm">
				</div>
				<select name="bulan" class="form-control form-control-sm">
					<option value="01" <?php echo ($nama_bulan['kode_bulan'] == "01") ? "selected" : ""; ?>>Januari</option>
					<option value="02" <?php echo ($nama_bulan['kode_bulan'] == "02") ? "selected" : ""; ?>>Februari</option>
					<option value="03" <?php echo ($nama_bulan['kode_bulan'] == "03") ? "selected" : ""; ?>>Maret</option>
					<option value="04" <?php echo ($nama_bulan['kode_bulan'] == "04") ? "selected" : ""; ?>>April</option>
					<option value="05" <?php echo ($nama_bulan['kode_bulan'] == "05") ? "selected" : ""; ?>>Mei</option>
					<option value="06" <?php echo ($nama_bulan['kode_bulan'] == "06") ? "selected" : ""; ?>>Juni</option>
					<option value="07" <?php echo ($nama_bulan['kode_bulan'] == "07") ? "selected" : ""; ?>>Juli</option>
					<option value="08" <?php echo ($nama_bulan['kode_bulan'] == "08") ? "selected" : ""; ?>>Agustus</option>
					<option value="09" <?php echo ($nama_bulan['kode_bulan'] == "09") ? "selected" : ""; ?>>September</option>
					<option value="10" <?php echo ($nama_bulan['kode_bulan'] == "10") ? "selected" : ""; ?>>Oktober</option>
					<option value="11" <?php echo ($nama_bulan['kode_bulan'] == "11") ? "selected" : ""; ?>>November</option>
					<option value="12" <?php echo ($nama_bulan['kode_bulan'] == "12") ? "selected" : ""; ?>>Desember</option>
				</select>
			</div>
		</form>
	</div>

	<!-- Content Row -->
	<div class="row">
		<div class="col">
			<h3 class="text-capitalize"><?= ($nama_bulan['bulan']) ?> <?= $nama_tahun['tahun'] ?></h3>
			<div class="row">
				<div class="col">
					<a href="<?= base_url('dashboard/laporan_dashboard_pdf') ?>" target="_blank" class="btn btn-sm btn-info mb-3">Export PDF</a>
					<button onclick="printDashboard();" id="print-pdf-dashboard" class="btn btn-sm btn-warning mb-3 text-dark">Print Laporan Kas</button>
					<iframe id="pdf-frame-dashboard" style="display: none;" width="0" height="0"></iframe>

				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<table class="table table-sm">
				<thead class="thead-dark">
					<tr class="text-center">
						<th scope="col" colspan="2">*Service</th>
					</tr>
				</thead>
				<tbody class="">
					<tr>
						<td>Revenue</td>
						<td class="text-right"><?= number_format($service['harga_jual'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td>Cost</td>
						<td class="text-right"><?= number_format($service['nominal_blb'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold">Profit</td>
						<td class="text-right"><?= number_format($service['laba'], 0, ',', ',') ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<table class="table table-sm">
				<thead class="thead-dark">
					<tr class="text-center">
						<th scope="col" colspan="2">*Tinta</th>
					</tr>
				</thead>
				<tbody class="">
					<tr>
						<td>Revenue</td>
						<td class="text-right"><?= number_format($tinta['terjual'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td>Cost</td>
						<td class="text-right"><?= number_format($tinta['modal'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold">Profit</td>
						<td class="text-right"><?= number_format($tinta['untung'], 0, ',', ',') ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<table class="table table-sm">
				<thead class="thead-dark">
					<tr class="text-center">
						<th scope="col" colspan="2">
							Cash Advance
							<a data-toggle="modal" data-target="#modalkasbon" style="cursor: pointer;" class="text-warning"><i class="far fa-edit"></i></a>

						</th>
					</tr>
				</thead>
				<tbody class="">
					<tr>
						<td><?= $kasbon['fuad']['nama'] ?></td>
						<td class="text-right"><?= number_format($kasbon['fuad']['kasbon'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td><?= $kasbon['other']['nama'] ?></td>
						<td class="text-right"><?= number_format($kasbon['other']['kasbon'], 0, ',', ',')  ?></td>
					</tr>

					<tr>
						<td class="font-weight-bold">Total</td>
						<td class="text-right "><?= number_format($total_kasbon['kasbon'], 0, ',', ',') ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<table class="table table-sm">
				<thead class="thead-dark">
					<tr class="text-center">
						<th scope="col" colspan="2">Payroll Expenses</th>
					</tr>
				</thead>
				<tbody class="">
					<tr>
						<td>Employe A</td>
						<td class="text-right"><?= number_format($gaji, 0, ',', ',')  ?></td>
					</tr>
					<tr>
						<td>Employe B</td>
						<td class="text-right"><?= number_format($kuliah, 0, ',', ',')  ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold">Sisa Saldo</td>
						<td class="text-right">
							<?= number_format(((($sisa_saldo['nominal'] + $service['laba'] + $tinta['terjual']) - ($total_kasbon['kasbon'] + ($belanja['belanja_1'] + $belanja['belanja_2'])) - ($gaji + $kuliah))), 0, ',', ',') ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<table class="table table-sm">
				<thead class="thead-dark">
					<tr class="text-center">
						<th scope="col" colspan="2">
							Cash flow
							<a data-toggle="modal" data-target="#modalSisaSaldo" style="cursor: pointer;" class="text-warning"><i class="far fa-edit"></i></a>
						</th>

					</tr>
				</thead>
				<tbody class="">
					<tr>
						<td>Opening Balance</td>
						<td class="text-right"><?= number_format($sisa_saldo['nominal'], 0, ',', ',')   ?></td>
					</tr>
					<tr>
						<td>Profit (Service)</td>
						<td class="text-right"><?= number_format($service['laba'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td>Revenue (Tinta)</td>
						<td class="text-right"><?= number_format($tinta['terjual'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td>Cash Advance</td>
						<td class="text-right"><?= number_format($total_kasbon['kasbon'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td>Non-Salary Expenses</td>
						<td class="text-right"><?= number_format(($belanja['belanja_1'] + $belanja['belanja_2']), 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold">Balance</td>
						<td class="text-right">
							<?= $total_saldo =  $total_saldo = number_format((($sisa_saldo['nominal'] + $service['laba'] + $tinta['terjual']) - ($total_kasbon['kasbon'] + ($belanja['belanja_1'] + $belanja['belanja_2']))), 0, ',', ',')
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			<table class="table table-sm">
				<thead class="thead-dark">
					<tr class="text-center">
						<th scope="col" colspan="2">
							Cash Management
							<a data-toggle="modal" data-target="#modalsaldo" style="cursor: pointer;" class="text-warning"><i class="far fa-edit"></i></a>
						</th>
					</tr>
				</thead>
				<tbody class="">
					<tr>
						<td>Bank</td>
						<td class="text-right"><?= number_format($ATM['nominal'], 0, ',', ',')   ?></td>
					</tr>
					<tr>
						<td>Cash</td>
						<td class="text-right"><?= number_format($Cash['nominal'], 0, ',', ',')   ?></td>
					</tr>
					<tr>
						<td>Total</td>
						<td class="text-right"><?= number_format(($ATM['nominal'] + $Cash['nominal']), 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td>Reconciliation</td>
						<td class="text-danger text-right"><?= number_format(((($sisa_saldo['nominal'] + $service['laba'] + $tinta['terjual']) - ($total_kasbon['kasbon'] + ($belanja['belanja_1'] + $belanja['belanja_2'])) - ($ATM['nominal'] + $Cash['nominal'])) * -1), 0, ',', ',') ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

<script>
	var base_url = "<?= base_url() ?>";

	function printDashboard() {
		var pdfUrl = base_url + "dashboard/laporan_dashboard_pdf"; // URL yang digunakan
		var iframe = document.getElementById("pdf-frame-dashboard");

		iframe.src = pdfUrl;
		iframe.onload = function() {
			try {
				iframe.contentWindow.focus();
				iframe.contentWindow.print();
			} catch (e) {
				alert("Tidak dapat mencetak laporan. Pastikan pop-up tidak diblokir di browser Anda.");
			}
		};
	}
</script>

<!-- Modal -->
<!-- sisa saldo -->
<div class="modal fade" id="modalSisaSaldo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Opening Balance</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('dashboard/ubahsisasaldo') ?>" method="post">
				<div class="modal-body">
					<input name="sisa_saldo" class="form-control form-control-sm" type="text" placeholder="<?= $sisa_saldo['nominal']   ?>" value="<?= $sisa_saldo['nominal'] ?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan & Ubah</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- modal saldo -->
<div class="modal fade" id="modalsaldo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Cash Manajemen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('dashboard/ubahsaldo') ?>" method="post">
				<div class="modal-body">
					<label for="saldo_ATM">Saldo ATM</label>
					<input name="ATM" id="saldo_ATM" class="form-control form-control-sm" type="text" placeholder="<?= $ATM['nominal']  ?>" value=" <?= $ATM['nominal']  ?>">
					<label for="saldo_cash">Saldo Cash</label>
					<input name="Cash" id="saldo_cash" class="form-control form-control-sm" type="text" placeholder="<?= $Cash['nominal'] ?>" value="<?= $Cash['nominal']  ?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan & Ubah</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- modal kasbon -->
<div class="modal fade" id="modalkasbon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Set Cash Advance</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('dashboard/ubahkasbon') ?>" method="post">
				<div class="modal-body">
					<label for="fuad">Employe A</label>
					<input name="fuad" id="fuad" class="form-control form-control-sm" type="text" placeholder="<?= $kasbon['fuad']['kasbon']  ?>" value="<?= $kasbon['fuad']['kasbon']  ?>">
					<label for="other">Employe B</label>
					<input name="other" id="other" class="form-control form-control-sm" type="text" placeholder="<?= $kasbon['other']['kasbon']  ?>" value="<?= $kasbon['other']['kasbon']  ?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan & Ubah</button>
				</div>
			</form>
		</div>
	</div>
</div>