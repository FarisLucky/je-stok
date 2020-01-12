const ubah_keranjang = document.querySelectorAll("form.form_cart");
const hapus_detail = document.querySelectorAll(".hapus_detail");
const hapus_semua = document.querySelectorAll(".hapus_semua");
const pilih_produk = document.querySelector("input[name='pilih']");

ubah_keranjang.forEach(element => {
	element.addEventListener("submit", function(event) {
		event.preventDefault();
		let url = BASE_URL + "keranjang/ubahkeranjang";
		let form = this;
		let method = "POST";
		getHttpRequestPost({ form, method, url: url })
			.then(response => {
				console.log(response);
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

pilih_produk &&
	pilih_produk.addEventListener("click", function(event) {
		event.preventDefault();
		let detail = this.dataset.detail;
		let status = this.dataset.status;
		let parameter = {
			method: "POST",
			url: BASE_URL + `keranjang/ubahstatusdetail/${detail}/${status}`
		};
		getHttpRequestPost(parameter)
			.then(response => {
				let total = document.getElementById("harga_total");
				let status = response.status_produk.detail.status_pilih;
				let detail_keranjang = response.detail_keranjang;
				console.log(detail_keranjang);
				let html = status === "iya" ? true : false;
				this.checked = html;
				this.dataset.status = status;
				console.log(detail_keranjang);
				let result =
					detail_keranjang.length === 0
						? "0"
						: calculatePrices(detail_keranjang);
				total.innerHTML = result;
			})
			.catch(error => {
				console.log(error);
			});
	});

function getHttpRequestPost({ method, url, form = undefined }) {
	return new Promise((resolve, reject) => {
		const form_data = form && $(form).serialize();
		const xhttp = new XMLHttpRequest();
		xhttp.open(method, url);
		if (form !== undefined) {
			xhttp.setRequestHeader(
				"Content-type",
				"application/x-www-form-urlencoded"
			);
		}
		xhttp.send(form_data);
		xhttp.responseType = "json";
		xhttp.onreadystatechange = () => {
			if (xhttp.readyState === 4) {
				if (xhttp.status == 200) {
					resolve(xhttp.response);
				} else {
					reject(xhttp.statusText);
				}
			}
		};
		xhttp.onerror = () => {
			reject(Error("Jaringan Error"));
		};
	});
}

function calculatePrices(products) {
	let total = 0;
	console.log(products);
	products.map(product_price => {
		console.log(product_price);
		total += product_price.harga * product_price.jumlah;
	});
	return total;
}
