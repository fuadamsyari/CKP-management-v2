document.addEventListener("DOMContentLoaded", function () {
	// Cek apakah halaman memiliki elemen untuk print service
	if (document.getElementById("pdf-frame-service")) {
		// Tambahkan event listener untuk tombol print
		var printServiceButton = document.getElementById("print-pdf-service");
		if (printServiceButton) {
			printServiceButton.addEventListener("click", function () {
				printService();
			});
		}
	}

	// Cek apakah halaman memiliki elemen untuk print tinta
	if (document.getElementById("pdf-frame-tinta")) {
		var printTintaButton = document.getElementById("print-pdf-tinta");
		if (printTintaButton) {
			printTintaButton.addEventListener("click", function () {
				printTinta();
			});
		}
	}

	// Cek apakah halaman memiliki elemen untuk print belanja
	if (document.getElementById("pdf-frame-belanja")) {
		var printBelanjaButton = document.getElementById("print-pdf-belanja");
		if (printBelanjaButton) {
			printBelanjaButton.addEventListener("click", function () {
				printBelanja();
			});
		}
	}
});

// Fungsi untuk mencetak laporan service
function printService() {
	var pdfUrl = base_url + "service/laporan_pdf/" + bulan_kode; // Sesuaikan base_url dan bulan_kode
	var iframe = document.getElementById("pdf-frame-service");
	iframe.src = pdfUrl;
	iframe.onload = function () {
		try {
			iframe.contentWindow.focus();
			iframe.contentWindow.print();
		} catch (e) {
			alert(
				"Tidak dapat mencetak laporan. Pastikan pop-up tidak diblokir di browser Anda."
			);
		}
	};
}

// Fungsi untuk mencetak laporan tinta
function printTinta() {
	var pdfUrl = base_url + "tinta/laporan_pdf/" + bulan_kode; // Sesuaikan base_url dan bulan_kode
	var iframe = document.getElementById("pdf-frame-tinta");
	iframe.src = pdfUrl;
	iframe.onload = function () {
		try {
			iframe.contentWindow.focus();
			iframe.contentWindow.print();
		} catch (e) {
			alert(
				"Tidak dapat mencetak laporan. Pastikan pop-up tidak diblokir di browser Anda."
			);
		}
	};
}

// Fungsi untuk mencetak laporan belanja
function printBelanja() {
	var pdfUrl = base_url + "belanja/laporan_pdf/" + bulan_kode; // Sesuaikan base_url dan bulan_kode
	var iframe = document.getElementById("pdf-frame-belanja");
	iframe.src = pdfUrl;
	iframe.onload = function () {
		if (iframe.contentWindow.document.readyState === "complete") {
			try {
				iframe.contentWindow.focus();
				iframe.contentWindow.print();
			} catch (e) {
				alert(
					"Tidak dapat mencetak laporan. Pastikan pop-up tidak diblokir di browser Anda."
				);
			}
		} else {
			iframe.onload = function () {
				iframe.contentWindow.focus();
				iframe.contentWindow.print();
			};
		}
	};
}
// fungsi untuk mencetak laporan po
function printPotinta() {
	var pdfUrl = base_url + "potinta/laporan_pdf/" + po_ke; // Sesuaikan base_url dan po_ke
	var iframe = document.getElementById("pdf-frame-potinta");
	iframe.src = pdfUrl;
	iframe.onload = function () {
		try {
			iframe.contentWindow.focus();
			iframe.contentWindow.print();
		} catch (e) {
			alert(
				"Tidak dapat mencetak laporan. Pastikan pop-up tidak diblokir di browser Anda."
			);
		}
	};
}
// Fungsi untuk mencetak laporan dashboard
