<div class="flash-data" data-notif="<?= $this->session->userdata('flash'); ?>"></div>
<?php $this->session->unset_userdata('flash') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-1">
		<!-- Approach -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Tutup Laporan dan Pembuatan Kerangka Laporan Tahunan yang Baru</h6>
			</div>
			<div class="card-body">
				<h3 class="text"><?= ($bulan['bulan']) ?> <?php echo ($tahun['tahun'])  ?></h3>
				<p class="text-danger">Informasi Penting!!!</p>
				<p>Pastikan bahwa laporan setiap bulan sudah di unduh atau di Print, Langkah ini akan menghapus Semua Data Service, Penjualan Tinta, dan Laporan Belanja yang ada di Database. Laporan akan Bermulai di Bulan Januari sampai dengan desember dengan kerangka Laporan baru yang masih Kosong.</p>
				<form action="<?= base_url('pengaturan/ubahtahun') ?>" method="post" id="ubahtahun">
					<div class="input-group-prepend">
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<input type="text" required name="tahun" placeholder="Masukan Tahun Mulai (untuk Kerangka Laporan yang baru)." class="form-control form-control-sm">
								<input type="submit" value="Hapus dan Mulai dengan Tahun Baru" class="btn btn-sm btn-danger" id="inputGroup-sizing-sm">
							</div>
						</div>
					</div>
				</form>
				<script>
					document.getElementById('ubahtahun').addEventListener('submit', function(event) {
						event.preventDefault(); // Mencegah form dari pengiriman default

						// Langkah pertama konfirmasi
						Swal.fire({
							title: 'Konfirmasi Awal',
							text: "Apakah Anda yakin ingin menghapus semua data yang ada?",
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#d33',
							cancelButtonColor: '#3085d6',
							confirmButtonText: 'Ya, lanjutkan!',
							cancelButtonText: 'Batal'
						}).then((result) => {
							if (result.isConfirmed) {
								// Langkah kedua konfirmasi
								Swal.fire({
									title: 'Konfirmasi Akhir',
									text: "Pastikan Anda telah memeriksa data yang akan dihapus. Data tidak dapat dipulihkan!",
									icon: 'warning',
									showCancelButton: true,
									confirmButtonColor: '#d33',
									cancelButtonColor: '#3085d6',
									confirmButtonText: 'Ya, hapus!',
									cancelButtonText: 'Kembali'
								}).then((result) => {
									if (result.isConfirmed) {
										this.submit();
									}
								});
							}
						});
					});
				</script>
			</div>
		</div>
	</div>
</div>