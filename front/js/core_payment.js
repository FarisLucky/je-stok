const bukti_bayar = document.querySelector('input[name="bukti_bayar"]');
const image_preview = document.getElementById("img_preview");

bukti_bayar.addEventListener("change", function(events) {
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

$("#date_picker_switch").datepicker({ format: "yyyy-mm-dd" });
$("#time_picker_switch").timepicker();
