const btns = document.querySelectorAll("a");
const form = document.querySelector(".form");
const close = document.querySelector(".close");

btns.forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        form.classList.add("show");
    })
})


close.addEventListener('click', function(s) {
    s.preventDefault();
    form.classList.remove("show");
})

form.addEventListener('submit', (event) => {
    event.preventDefault();
    const formData = new FormData(form);
        fetch('/send.php', {
            method: 'POST',
            body: formData
        })
})