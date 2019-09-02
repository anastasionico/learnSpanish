
function resetFooterMessage() {
	document.getElementById("footerMessage").innerHTML='';
}

window.onload = function () {
	document.getElementById("footerMessage").addEventListener("focus", resetFooterMessage);
};