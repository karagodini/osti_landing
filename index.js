const btn = document.querySelector(".style-btn");
const form = document.querySelector(".form");
const close = document.querySelector(".close");

btn.addEventListener('click', function(e) {
    e.preventDefault();
    form.classList.add("show");
})

close.addEventListener('click', function(s) {
    s.preventDefault();
    form.classList.remove("show");
})