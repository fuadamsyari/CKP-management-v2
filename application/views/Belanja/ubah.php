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
							<input type="text" name="tanggal" class="form-control form-control-sm" id="tanggal" placeholder="<?= $belanja['tanggal'] ?>" value="<?= $belanja['tanggal'] ?>">
							<div class="text-danger">
								<p class=""><?= form_error('tanggal'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="belanja_1">Belanja Bulanan</label>
							<input type="number" name="belanja_1" class="form-control form-control-sm" id="belanja_1" placeholder="<?= $belanja['belanja_1'] ?>" value="<?= $belanja['belanja_1'] ?>">
							<div class="text-danger">
								<p class=""><?= form_error('belanja_1'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="belanja_2">Belanja parts</label>
							<input type="number" name="belanja_2" class="form-control form-control-sm" id="belanja_2" placeholder="<?= $belanja['belanja_2'] ?>" value="<?= $belanja['belanja_2'] ?>">
							<div class="text-danger">
								<p class=""><?= form_error('belanja_2'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="ket">Keterangan</label>
							<input type="text" name="ket" class="form-control form-control-sm" id="ket" placeholder="<?= $belanja['ket'] ?>" value="<?= $belanja['ket'] ?>">
							<div class="text-danger">
								<p class=""><?= form_error('ket'); ?></p>
							</div>
						</div>

						<div class="form-group">
							<label>Ubah</label><br>
							<button type="submit" class=" px-5 btn btn-sm btn-primary">Ubah</button>
							<a href="<?= base_url('belanja/bulan/' . $bulan) ?>" class="  btn btn-sm btn-danger">Kembali</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
