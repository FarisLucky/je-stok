const payment = document.querySelector("#payment_date");
const view_count_down = document.querySelector("#time_count_down");
const start_payment = payment.dataset.start;
const expired_payment = payment.dataset.exp;
const countDate = new Date(start_payment).getTime();
console.log(countDate);
const x = setInterval(() => {
	let now = new Date(expired_payment).getTime();
	let distance = countDate - now;
	let day = Math.floor(distance / (1000 * 60 * 60 * 24));
	let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	let seconds = Math.floor((distance % (1000 * 60)) / 1000);
  view_count_down.innerHTML = `${day}hari ${minutes}menit ${seconds}detik`;
}, 1000);
