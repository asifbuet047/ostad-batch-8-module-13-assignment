const login_form = document.getElementById("login_form");

login_form.addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(login_form);
    const csrf_token = formData.get("_token");

    const response = await fetch("/login", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrf_token,
            Accept: "application/json",
        },
        body: formData,
    });

    const data = await response.json();
    console.log(data);

    const success = document.getElementById("success-message");
    const error = document.getElementById("error-message");
    const emailField = document.getElementById("email");
    const passwordField = document.getElementById("password");
    const login_button = document.getElementById("login_button");

    if (response.ok) {
        success.textContent = data.message;
        success.classList.remove("d-none");
        emailField.disabled = true;
        passwordField.disabled = true;
        login_button.textContent = "Go to Your dashboard";
        login_button.addEventListener("click", () => {
            window.location.href = "/";
        });
    } else {
        console.log(data);
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
