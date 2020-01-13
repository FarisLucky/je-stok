const select_provinsi = document.querySelector(
	'select[name="i_provinsi_profil"]'
);
const input_foto = document.querySelector('input[name="ganti_foto"]');
const image_preview = document.getElementById("profil_img");

select_provinsi &&
	select_provinsi.addEventListener("change", function(event) {
		event.preventDefault();
		let id_provinsi = this.value;
		let parameter = {
			method: "GET",
			url: BASE_URL + "admin/profil/kabupaten/" + id_provinsi
		};
		doRequest(parameter).then(response => {
			let element_kabupaten = document.querySelector(
				'select[name="i_kota_profil"]'
			);
			let data_kabupaten = JSON.parse(response);
			let html = "";
			data_kabupaten.data.map(kab => {
				html += `<option value='${kab.id_kabupaten}'>${kab.kabupaten}</option>`;
			});
			element_kabupaten.innerHTML = html;
		});
	});

const select_kabupaten = document.querySelector('select[name="i_kota_profil"]');

select_kabupaten &&
	select_kabupaten.addEventListener("change", function(event) {
		event.preventDefault();
		let id_kabupaten = this.value;
		let parameter = {
			method: "GET",
			url: BASE_URL + "admin/profil/kecamatan/" + id_kabupaten
		};
		doRequest(parameter).then(response => {
			let element_kecamatan = document.querySelector(
				'select[name="i_kecamatan_profil"]'
			);
			let data_kecamatan = JSON.parse(response);
			let html = "";
			data_kecamatan.data.map(kec => {
				html += `<option value='${kec.id_kecamatan}'>${kec.kecamatan}</option>`;
			});
			element_kecamatan.innerHTML = html;
		});
	});

input_foto &&
	input_foto.addEventListener("change", function(events) {
		events.preventDefault();
		readURL(this, image_preview);
	});

function readURL(input, selector) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$(selector).attr("src", e.target.result);
		};
		reader.readAsDataURL(input.files[0]);
	}
}

function doRequest({ method, url, form }) {
	return new Promise((resolve, reject) => {
		const xhttp = new XMLHttpRequest();
		const send_data = form || undefined;
		xhttp.open(method, url);
		if (form !== undefined) {
			xhttp.setRequestHeader(
				"Content-type",
				"application/x-www-form-urlencoded"
			);
		}
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState === 4) {
				if (xhttp.status == 200) {
					resolve(xhttp.response);
				} else {
					reject(xhttp.statusText);
				}
			}
		};
		xhttp.send(send_data);
	});
}
