// pardon my javascript

function collapse(element) {
    let inner = document.getElementById(element);
    if (inner.style.display != "block") {
        inner.style.display = "block";
    } else {
        inner.style.display = "none";
    }
}