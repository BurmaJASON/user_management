// add hovered class to selected list item
const list: NodeListOf<Element> = document.querySelectorAll(".navigation li");

function activeLink(event: Event): void {
  list.forEach((item: Element) => {
    item.classList.remove("hovered");
  });
  (event.target as Element).classList.add("hovered");
}

list.forEach((item: Element) => item.addEventListener('click', activeLink));

// Menu Toggle
const toggle: HTMLElement | null = document.querySelector(".toggle");
const navigation: HTMLElement | null = document.querySelector(".navigation");
const main: HTMLElement | null = document.querySelector(".main");

if (toggle && navigation && main) {
  toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
  };
}
