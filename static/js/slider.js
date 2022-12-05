"use strict";

document.getElementById('slider_left').onclick = sliderLeft;
document.getElementById('slider_right').onclick = sliderRight;
let offset = 0;

function sliderRight () {
	let polosa = document.getElementById('polosa');
	offset = offset - 500;
	if (offset < -1000) {
		offset = 0;
	}
	polosa.style.left = offset + 'px';
}


function sliderLeft () {
	let polosa = document.getElementById('polosa');
	offset = offset + 500;
	if (offset > 0) {
		offset = -1000;
	}
	polosa.style.left = offset + 'px';
}
