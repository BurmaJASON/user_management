// add hovered class to selected list item
var list = document.querySelectorAll(".navigation li");
function activeLink(event) {
    list.forEach(function (item) {
        item.classList.remove("hovered");
    });
    event.target.classList.add("hovered");
}
list.forEach(function (item) { return item.addEventListener('click', activeLink); });
// Menu Toggle
var toggle = document.querySelector(".toggle");
var navigation = document.querySelector(".navigation");
var main = document.querySelector(".main");
if (toggle && navigation && main) {
    toggle.onclick = function () {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };
}
