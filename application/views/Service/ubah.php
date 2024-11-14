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
						<div class="form-group">
							<label for="tanggal">Tanggal</label>
							<input type="text" name="tanggal" class="form-control form-control-sm" id="tanggal" placeholder="<?= $services['tanggal'] ?>" value="<?= $services['tanggal'] ?>">
							<div class="text-danger">
								<p class=""><?= form_error('tanggal'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="customer">Customer</label>
							<input type="text" name="customer" id="customer" class="form-control form-control-sm" placeholder="Customer" value="<?= $services['customer'] ?>" required>
							<div class="text-danger">
								<p class=""><?= form_error('customer'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<input type="text" name="alamat" id="alamat" class="form-control form-control-sm" placeholder="Alamat" value="<?= $services['alamat'] ?>" required>
							<div class="text-danger">
								<p class=""><?= form_error('alamat'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="barang">Barang</label>
							<input type="text" name="barang" id="barang" class="form-control form-control-sm" placeholder="Barang" value="<?= $services['barang'] ?>" required>
							<div class="text-danger">
								<p class=""><?= form_error('barang'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="blb">Non-Stock Purchase</label>
							<input type="text" name="blb" id="blb" class="form-control form-control-sm" placeholder="BLB" value="<?= $services['blb'] ?>">
							<div class="text-danger">
								<p class=""><?= form_error('blb'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="nominal_blb">Nominal NS</label>
							<input type="text" name="nominal_blb" id="nominal_blb" class="form-control form-control-sm" placeholder="Nominal BLB" value="<?= $services['nominal_blb'] ?>">
							<div class="text-danger">
								<p class=""><?= form_error('nominal_blb'); ?></p>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="harga_jual">Harga Jual</label>
							<input type="text" name="harga_jual" id="harga_jual" class="form-control form-control-sm" placeholder="harga Jual" value="<?= $services['harga_jual'] ?>" required>
							<div class="text-danger">
								<p class=""><?= form_error('harga_jual'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="laba">Laba</label>
							<input type="text" name="laba" id="laba" class="form-control form-control-sm" placeholder="laba" value="<?= $services['laba'] ?>" required>
							<div class="text-danger">
								<p class=""><?= form_error('laba'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="ket">Keteranagan</label>
							<input type="text" name="ket" id="ket" class="form-control form-control-sm" placeholder="Keteranagan" value="<?= $services['ket'] ?>">
							<div class="text-danger">
								<p class=""><?= form_error('ket'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="nota">Nota</label>
							<input type="text" name="nota" id="nota" class="form-control form-control-sm" placeholder="Nota" value="<?= $services['nota'] ?>" required>
							<div class="text-danger">
								<p class=""><?= form_error('nota'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label>Ubah</label><br>
							<button type="submit" class=" px-5 btn btn-sm btn-primary">Ubah</button>
							<a href="<?= base_url('service/bulan/' . $bulan) ?>" class="  btn btn-sm btn-danger">Kembali</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
