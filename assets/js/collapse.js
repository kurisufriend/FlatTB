// pardon my javascript

function collapse() {
    var inner = document.getElementById("form-collapsible");
    if (inner.style.display != "none") {
        inner.style.display = "none";
    } else {
        inner.style.display = "block";
    }
}