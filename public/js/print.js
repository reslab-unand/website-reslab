window.addEventListener('DOMContentLoaded', () => {
	window.focus();
	let printButton = document.querySelector('#print-button');
	printButton.addEventListener('click', () => {
		window.print();
	});
});
