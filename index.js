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
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '/send.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      form.classList.remove("show");
    }
  };
  const formData = new FormData(form);
  const encodedData = new URLSearchParams(formData).toString(); // encode form data
  xhr.send(encodedData); // send encoded form data with the request
});