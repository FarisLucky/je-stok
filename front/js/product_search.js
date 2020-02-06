const input_search = document.getElementById("search");
const btn_cari = document.getElementById("btn_cari");

input_search.addEventListener("keyup", function() {
	// e.preventDefault();
	let value = this.value;
	console.log(value);
});

btn_cari.addEventListener("submit", function(e) {
	e.preventDefault();
	let value = input_search.value;
	window.location.href = BASE_URL + "produk/search/" + value;
});
