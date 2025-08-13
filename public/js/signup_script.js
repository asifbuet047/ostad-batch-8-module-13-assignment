const signup_form = document.getElementById("signup_form");

signup_form.addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(signup_form);
    const csrf_token = formData.get("_token");

    const response = await fetch("/signup", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrf_token,
            Accept: "application/json",
        },
        body: formData,
    });

    const data = await response.json();

    const success = document.getElementById("success-message");
    const error = document.getElementById("error-message");
    const nameField = document.getElementById("name");
    const emailField = document.getElementById("email");
    const passwordField = document.getElementById("password");
    const confirmField = document.getElementById("password_confirmation");
    const signup_button = document.getElementById("signup_button");

    if (response.ok) {
        success.textContent = data.message;
        success.classList.remove("d-none");
        error.classList.add("d-none");
        nameField.disabled = true;
        emailField.disabled = true;
        passwordField.disabled = true;
        confirmField.disabled = true;
        signup_button.textContent = "Log in to Your account";
        signup_button.addEventListener("click", () => {
            window.location.href = "/login";
        });
    } else {
        let errors = data.errors;
        let html = "<ul>";
        for (const key in errors) {
            html += `<li>${errors[key][0]}</li>`;
        }
        html += "</ul>";
        error.innerHTML = html;
        error.classList.remove("d-none");
    }
});
