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

const select_provinsi = document.querySelector(
	'select[name="i_provinsi_profil"]'
);

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
