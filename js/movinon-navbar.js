// menu bar
const menuBar = document.querySelector('.menu-bar');
let menuBarOpen = false;

menuBar.addEventListener("click", function() {
    if (!menuBarOpen) {
        menuBar.classList.add('open');
        menuBarOpen = true;
    } else {
        menuBar.classList.remove('open');
        menuBarOpen = false;
    }
});

