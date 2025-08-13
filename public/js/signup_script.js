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

    if (response.ok) {
        console.log(data);
        success.textContent = data.message;
        success.classList.remove("d-none");
        signup_form.reset();
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
