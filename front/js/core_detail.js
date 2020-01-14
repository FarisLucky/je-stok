const beli = document.querySelector("#beli");
const add_cart = document.querySelector("#add_cart");

add_cart.addEventListener("click", event => {
	event.preventDefault();

	let url = BASE_URL + "detail_produk/tambahkeranjang";
	let form = "#form_detail";
	getHttpRequestPost({ form, url: url })
		.then(response => {
			let result = response.data;
			if (result.error === true && result.form_error) {
				let form = Object.entries(result.form_error);
				form.map(value => {
					if (value[1] !== "") {
						alert(value[1]);
					}
				});
			} else if (result.error === true) {
				alert(result.capt);
			} else if (result.login === true) {
        window.location.href = BASE_URL+"auth";
      }  else {
        showToast(result.capt);
			}
		})
		.catch(error => {
			console.log(error);
		});
});

beli.addEventListener("click", event => {
	event.preventDefault();

	let url = BASE_URL + "detail_produk/tambahkeranjang";
	let form = "#form_detail";
	getHttpRequestPost({ form, url: url })
		.then(response => {
			let result = response.data;
			if (result.error === true && result.form_error) {
				let form = Object.entries(result.form_error);
				form.map(value => {
					if (value[1] !== "") {
						alert(value[1]);
					}
				});
			} else if (result.error === true) {
				alert(result.capt);
			} else if (result.login === true) {
        window.location.href = BASE_URL+"auth";
      } else {
				window.location.href = BASE_URL + "keranjang";
			}
		})
		.catch(error => {
			console.log(error);
		});
});

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
