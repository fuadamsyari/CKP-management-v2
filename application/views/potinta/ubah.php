<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
	</div>

	<!-- Content Row -->
	<div class="row">
		<div class="col-sm-12">
			<form action="" method="post">
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group mb-3">
							<select name="warna" class="form-control" id="warna" required>
								<option value="C" <?= ($tinta['warna'] == "C") ? "selected" : ''  ?>>Cyan</option>
								<option value="M" <?= ($tinta['warna'] == "M") ? "selected" : ''  ?>>Magenta</option>
								<option value="Y" <?= ($tinta['warna'] == "Y") ? "selected" : ''  ?>>Yellow</option>
								<option value="K" <?= ($tinta['warna'] == "K") ? "selected" : ''  ?>>Black</option>
							</select>
							<div class="text-danger">
								<p class=""><?= form_error('warna'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<select type="text" name="tinta" class="form-control" id="tinta" placeholder="Tinta" required>
								<option <?= ($tinta['tinta'] == "Brother") ? "selected" : ''  ?> value="Brother">Brother</option>
								<option <?= ($tinta['tinta'] == "Canon") ? "selected" : ''  ?> value="Canon">Canon</option>
								<option <?= ($tinta['tinta'] == "Epson 003") ? "selected" : ''  ?> value="Epson 003">Epson 003</option>
								<option <?= ($tinta['tinta'] == "Epson 664") ? "selected" : ''  ?> value="Epson 664">Epson 664</option>
								<option <?= ($tinta['tinta'] == "HP") ? "selected" : ''  ?> value="HP">HP</option>
							</select>
							<div class="text-danger">
								<p class=""><?= form_error('tinta'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label>Ubah</label><br>
							<button type="submit" class=" px-5 btn btn-sm btn-primary">Ubah</button>
							<a href="<?= base_url('potinta/show/' . $po_ke) ?>" class="  btn btn-sm btn-danger">Kembali</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->