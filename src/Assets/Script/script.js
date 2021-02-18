var email = document.getElementById("email");

email.addEventListener("keyup", function (event) {
    if (email.validity.typeMismatch) {
        email.setCustomValidity("Cela ne ressemble pas un e-mail correct...");
    } else {
        email.setCustomValidity("");
    }
});