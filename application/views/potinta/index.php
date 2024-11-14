<div class="flash-data" data-notif="<?= $this->session->userdata('flash'); ?>"></div>
<?php $this->session->unset_userdata('flash') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between">
		<h1 class="h3 mb-0 text-gray-800">Daftar <?= $title ?></h1>
	</div>
	<div class="d-sm-flex align-items-center">
		<p>Laporan Tinta setiap kali Order / Pre Order Tinta <br>
			<span>Data disajikan per Satukali Order / PO</span>
		</p>
	</div>

	<!-- Content Row -->
	<div class="row">
		<div class="col-xl-2 col-md-2 mb-4 ">
			<a href="<?= base_url('potinta/tambahpo') ?>" id="tambah-data" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#form-tambah-data">Tambah List PO baru</a>
		</div>
		<div class="col-xl-2 col-md-2 mb-4  ml-0 pl-0">
			<form id="form-hapuspo" method="post" action="<?= base_url('potinta/hapuspo') ?>" onsubmit="konfhapus(); return false;">
				<div class="input-group input-group-sm mb-3">
					<div class="input-group-prepend">
						<input type="submit" value="hapus" class=" btn btn-sm btn-danger" id="inputGroup-sizing-sm">
					</div>
					<input type="number" name="po_ke" class="form-control" placeholder="No PO" required>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<!-- Per Bulan -->
		<?php foreach ($po as $p) : ?>
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary  light shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text font-weight-bold text-dark text-uppercase mb-1">
									PO Tinta ke : <?= $p['po_ke'] ?>
								</div>
								<div class="text-xs mb-0 font-weight-bold text-gray-600"><?= $p['tgl_po'] ?></div>
							</div>
							<div class="col-auto">
								<a href="<?= base_url('potinta/show/' . $p['po_ke']) ?>" class="text-dark"><i class="fas fa-sign-in-alt fa-3x"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>






	</div>
	<!-- /.container-fluid -->

	<!-- Modal -->
	<div class="modal fade" id="form-tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="<?= base_url('/potinta/tambahpo') ?>">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Data PO Tinta</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="date" name="tanggal" class="form-control" id="tanggal" required>
							<div class="text-danger">
								<p class=""><?= form_error('tanggal'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<input type="number" name="po_ke" class="form-control" id="po_ke" placeholder="Pre Order Ke berapa" required>
							<div class="text-danger">
								<p class=""><?= form_error('po_ke'); ?></p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
						<button type="submit" class="btn btn-primary">Tambah List PO</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>