
$(function() {
	var scroll,
		offset_y = 60;
	// $(".cs-copyright").click(function(e) {
	// 	e.preventDefault();
	// 	window.scrollTo({ top: 0, behavior: "smooth" });
	// });
	document.onscroll = () => {
		scroll = $(window).scrollTop();
		if (scroll >= offset_y) {
			$(".container-desktop").addClass("tsy-30");
		} else {
			$(".container-desktop").removeClass("tsy-30");
		}
	};
});