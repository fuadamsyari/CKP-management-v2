// membuat notif dengan sweet alert
const flashdata = document.querySelector(".flash-data");
const dataflash = flashdata.getAttribute("data-notif");

if (dataflash == "di Tambahkan" || dataflash == "di Ubah") {
	Swal.fire({
		icon: "success",
		title: "Data Berhasil",
		text: "Berhasil " + dataflash,
	});
}
if (dataflash == "di Hapus") {
	Swal.fire("Terhapus!", "Data talah dihapus.", "success");
}

// fungsi untuk hapus saat click trash
const tombolHapus = document.querySelectorAll(".tombol-hapus");
for (const btn of tombolHapus) {
	btn.addEventListener("click", function (e) {
		e.preventDefault();
		const href = this.getAttribute("data-url");
		Swal.fire({
			title: "Hapus?",
			text: "Cancel untuk membatalkan",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Hapus Data!",
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		});
	});
}
// konf hapus sweet alert
function konfhapus() {
	Swal.fire({
		title: "Hapus?",
		text: "Cancel untuk membatalkan",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus Data!",
	}).then((result) => {
		if (result.isConfirmed) {
			document.getElementById("form-hapuspo").submit();
		}
	});
}
document
	.getElementById("ubahtahun")
	.addEventListener("submit", function (event) {
		event.preventDefault(); // Mencegah form dari pengiriman default

		// Langkah pertama konfirmasi
		Swal.fire({
			title: "Konfirmasi Awal",
			text: "Apakah Anda yakin ingin menghapus semua data yang ada?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#d33",
			cancelButtonColor: "#3085d6",
			confirmButtonText: "Ya, lanjutkan!",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				// Langkah kedua konfirmasi
				Swal.fire({
					title: "Konfirmasi Akhir",
					text: "Pastikan Anda telah memeriksa data yang akan dihapus. Data tidak dapat dipulihkan!",
					icon: "warning",
					showCancelButton: true,
					confirmButtonColor: "#d33",
					cancelButtonColor: "#3085d6",
					confirmButtonText: "Ya, hapus!",
					cancelButtonText: "Kembali",
				}).then((result) => {
					if (result.isConfirmed) {
						// Jika pengguna mengonfirmasi, kirim form
						this.submit();
					}
				});
			}
		});
	});
