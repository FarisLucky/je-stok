function getHttpRequestPost(obj) {
	return new Promise((resolve, reject) => {
		const form = $(obj.form).serialize();
		const xhttp = new XMLHttpRequest();
		xhttp.open("POST", obj.url);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(form);
		xhttp.responseType = "json";
		xhttp.onload = () => {
			if (xhttp.status == 200) {
				resolve(xhttp.response);
			} else {
				reject(xhttp.statusText);
			}
		};
		xhttp.onerror = () => {
			reject(Error("Jaringan Error"));
		};
	});
}

const ubah_keranjang = document.querySelectorAll("form.form_cart");
ubah_keranjang.forEach(element => {
	element.addEventListener("submit", function(event) {
		event.preventDefault();
		let url = BASE_URL + "keranjang/ubahkeranjang";
		let form = this;
		getHttpRequestPost({ form, url: url })
			.then(response => {
				if (response.form_error !== undefined) {
					alert(response.form_error);
				} else if (response.error === true) {
					alert(response.capt);
				} else {
					alert("Berhasil dilakukan");
					window.location.reload();
				}
			})
			.catch(error => {
				console.log(error);
			});
	});
});

const hapus_detail = document.querySelectorAll(".hapus_detail");
hapus_detail.forEach(element => {
	element.addEventListener("click", function(event) {
		event.preventDefault();
		let dataset = this.dataset.set;
		let hapus = window.confirm("Hapus Data ?");
		if (hapus) {
			window.location.href = `${BASE_URL}keranjang/hapusdetail/${dataset}`;
		}
	});
});

const hapus_semua = document.querySelectorAll(".hapus_semua");
hapus_semua.forEach(element => {
	element.addEventListener("click", function(event) {
		event.preventDefault();
		let dataset = this.dataset.set;
		let hapus = window.confirm("Hapus Semua Data ?");
		if (hapus) {
			window.location.href = `${BASE_URL}keranjang/hapussemuadetail/${dataset}`;
		}
	});
});
