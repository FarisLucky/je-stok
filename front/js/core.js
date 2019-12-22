function ajaxCall({ method, url, form }) {
	return $.ajax({
		type: method,
		url: url,
		data: form,
		dataType: "JSON"
	});
}
$(function() {
	// <++ Transaksi Javascript Awal ++>

	// Provinsi Change in Modal Transaksi
	$(".provinsi").on("change", function(e) {
		e.preventDefault();
		const id = $(this).val();
		const $kabupaten = $(".kabupaten");
		const parameter = {
			method: "GET",
			url: BASE_URL + "transaksi/kabupaten/" + id
		};
		ajaxCall(parameter).done(function(response) {
			let html = '<option value="">-- Pilih Kabupaten --</option>';
			if (response.status == true) {
				$.map(response.data, function(v) {
					html += '<option value="' + v.id_kabupaten + '">';
					html += v.kabupaten;
					html += "</option>";
				});
			}
			$kabupaten.html(html);
			$kabupaten.parents(".col-sm-12").removeClass("hidden-form");
			$kabupaten.parents(".col-sm-12").addClass("visible-form");
		});
	});

	// Kabupaten Change in Modal Transaksi
	$(".kabupaten").on("change", function(e) {
		e.preventDefault();
		const id = $(this).val();
		const $kecamatan = $(".kecamatan");
		const parameter = {
			method: "POST",
			url: BASE_URL + "transaksi/kecamatan/" + id
		};
		ajaxCall(parameter).done(function(response) {
			let html = '<option value="">-- Pilih Kecamatan --</option>';
			if (response.status == true) {
				$.each(response.data, function(i, v) {
					html += '<option value="' + v.id_kecamatan + '">';
					html += v.kecamatan;
					html += "</option>";
				});
			}
			$kecamatan.html(html);
			$kecamatan.parents(".col-sm-12").removeClass("hidden-form");
			$kecamatan.parents(".col-sm-12").addClass("visible-form");
		});
	});

	// Insert Alamat in Transaksi
	$("#form_alamat_transaksi").on("submit", function(e) {
		e.preventDefault();
		let form_alamat = $(this).serialize();
		const parameter = {
			method: "POST",
			url: BASE_URL + "transaksi/corealamat/" + id,
			form: form_alamat
		};
		ajaxCall(parameter).done(function(response) {
			if (response.status == false) {
				$.map(response.data, function(v, i) {
					let element = $("[name='" + i + "']");
					element
						.removeClass("is-invalid")
						.addClass(v.length > 0 ? "is-invalid" : "is-valid")
						.next()
						.remove();
					element.after(v);
				});
			} else {
				$this.trigger("reset");
				$this.find(".form-control").removeClass("is-invalid");
				$this.find(".form-control").removeClass("is-valid");
				$(".modal").modal("hide");
			}
		});
	});

	// Save and Replace Alamat Pengiriman Selected From Modal
	$(document).on("submit", "#pilih_alamat", function(e) {
		e.preventDefault();
		const id = $("input[name='pilih_alamat']:checked").val();
		const url = BASE_URL + "transaksi/ubahalamattujuan/" + id;
		const courier = $("#ongkir_input").val();
		$.get(url, function(response) {
			$("#body_alamat").html(response.alamat);
			$("#body_ongkir").html(response.ongkir);
			$("#body_grand_total").html(response.grand_total);
		}).done(function(response) {
			$("#modal_alamat").modal("hide");
		});
	});

	// Function for modal tambah alamat2 transaksi
	$("#tambah_alamat2").on("click", function(e) {
		e.preventDefault();
		$("#modal_alamat").modal("hide");
		setTimeout(function() {
			$("#modal_tambah").modal("show");
		}, 500);
	});

	// Change modal Alamat Pengiriman in Transaksi
	$("#req_alamat").on("click", function(e) {
		e.preventDefault();
		const url = BASE_URL + "transaksi/alamatuser/";
		$.get(url).done(function(response) {
			let html = response.data;
			$(".address-user").html(html);
			$("#modal_alamat").modal("show");
		});
	});

	//Ongkir Select Modal
	$("#ongkir_select").on("click", function(e) {
		e.preventDefault();
		const destination = $("#alamat_input").val();
		const url = BASE_URL + `transaksi/getallongkir/${destination}`;
		$.get(url).done(function(response) {
			let html = "";
			let arrayKurir = JSON.parse(response.data);
			console.log(arrayKurir);
			$.map(arrayKurir, function(v) {
				html += `<option value="dakota">Dakota Cargo - min(${v[0].minkg} kg) &emsp;Rp.${v[0].pokok}</option>`;
			});
			$("#ongkir_group").html(html);
			$("#modal_ongkir").modal("show");
		});
	});
	// Close Modal
	$(document).on("click", "#close_modal", function(e) {
		e.preventDefault();
		const modal = $("#modal_ongkir");
		$("#transaksi_modal .modal-content").empty();
		modal.modal("hide");
	});

	$("#form_transaksi").on("submit", function(e) {
		e.preventDefault();
		const form_transaksi = $(this).serialize();
		const confirm_option = confirm("Apakah ingin dilanjutkan ?");
		if (confirm_option) {
			const parameter = {
				method: "POST",
				url: BASE_URL + "transaksi/coretransaksi",
				form: form_transaksi
			};
			ajaxCall(parameter).done(response => {
				console.log(response);
			});
		}
	});
	//
	// <-- Transaksi Javascript Akhir -->
});
