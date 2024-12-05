const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');
const search = document.querySelector('Search');
let menuOpen = false;

hamburger.addEventListener('click', () => {
    menuOpen = !menuOpen; // Toggle menuOpen state
    navLinks.style.display = menuOpen ? "block" : "none"; // Show/Hide navLinks based on menuOpen
    search.style.display = menuOpen ?  "none" : "block";
});





