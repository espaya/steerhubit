document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".job__contact form");
    const responseDiv = document.getElementById("form-response");

    form.addEventListener("submit", async function (e) {
        e.preventDefault(); // prevent page reload

        // Clear previous messages
        responseDiv.innerHTML = "";
        responseDiv.className = "";

        // Clear inline validation errors
        form.querySelectorAll(".text-danger").forEach(
            (el) => (el.textContent = "")
        );

        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'input[name="_token"]'
                    ).value,
                    Accept: "application/json",
                },
                body: formData,
            });

            const data = await response.json();

            if (response.ok) {
                // Display success message
                responseDiv.className = "alert alert-success";
                responseDiv.textContent =
                    data.message ||
                    "Password reset successful. You can now log in.";
                form.reset(); // Optional: clear form

                setTimeout(() => {
                    window.location.href = "/sign-in";
                }, 2000);
            } else {
                // Display validation errors
                if (data.errors) {
                    for (const [field, messages] of Object.entries(
                        data.errors
                    )) {
                        const errorField = form.querySelector(
                            `[name="${field}"]`
                        );
                        if (errorField) {
                            const small = errorField
                                .closest(".search__item")
                                ?.querySelector(".text-danger");
                            if (small) small.textContent = messages[0];
                        }
                    }

                    responseDiv.className = "alert alert-danger";
                    responseDiv.textContent =
                        "Please fix the errors in the form.";
                } else {
                    responseDiv.className = "alert alert-danger";
                    responseDiv.textContent =
                        data.message || "An error occurred.";
                }
            }
        } catch (error) {
            console.error("Request error:", error);
            responseDiv.className = "alert alert-danger";
            responseDiv.textContent = "A network or server error occurred.";
        }
    });
});
