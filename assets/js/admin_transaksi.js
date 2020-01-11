const konfirmasi_bayar = document.querySelectorAll(".konfirmasi_bayar");
const form_resi = document.querySelector("#form_resi");
const button_hapus = document.querySelectorAll(".hapus_pembayaran");
konfirmasi_bayar.forEach(confirm_button => {
	confirm_button.addEventListener("click", function(event) {
		event.preventDefault();
		let data_id = this.dataset.confirm;
		Swal.fire({
			title: "Konfirmasi",
			text: "Apakah ingin dikonfirmasi ?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Konfirmasi"
		}).then(result => {
			if (result.value) {
				window.location.href =
					BASE_URL + "admin/transaksi/konfirmasibayar/" + data_id;
			}
		});
	});
});

button_hapus.forEach(hapus_button => {
	hapus_button.addEventListener("click", function(event) {
		event.preventDefault();
		let data_id = this.dataset.hapus;
		Swal.fire({
			title: "Hapus",
			text: "Apakah ingin dihapus ?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "hapus"
		}).then(result => {
			if (result.value) {
				window.location.href =
					BASE_URL + "admin/transaksi/hapusbayar/" + data_id;
			}
		});
	});
});

button_resi.forEach(resi => {
	resi.addEventListener("click", function(event) {
		event.preventDefault();
		let id_order = this.dataset.order;
		let input_element = document.querySelector("input[name='input_hidden']");
		let modal_element = $("#modal_resi");
		modal_element.modal("show");
		input_element.value = id_order;
	});
});
