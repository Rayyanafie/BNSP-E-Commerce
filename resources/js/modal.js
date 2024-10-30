// Get elements
var modal = document.getElementById("myModal");
var modalOverlay = document.getElementById("modalOverlay");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal and show overlay
btn.onclick = function () {
    modal.style.display = "block";
    modalOverlay.style.display = "block"; // Show overlay
}

// When the user clicks on <span> (x), close the modal and hide overlay
span.onclick = function () {
    modal.style.display = "none";
    modalOverlay.style.display = "none"; // Hide overlay
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modalOverlay) { // Detect click on overlay
        modal.style.display = "none";
        modalOverlay.style.display = "none"; // Hide overlay
    }
}
