(function () {
    "use strict";
    document.addEventListener("DOMContentLoaded", function () {
        $("#login-admin").on("submit", function (e) {
            e.preventDefault();

            const user = document.querySelector("#user").value,
                password = document.querySelector("#password").value,
                loginAdmin = document.querySelector("#login-admin-submit")
                    .value;

            // Start AJAX
            const dataAdmin = new FormData();
            dataAdmin.append("user", user);
            dataAdmin.append("password", password);
            dataAdmin.append("login-admin", loginAdmin);

            // Create the object
            const xhr = new XMLHttpRequest();
            // Open the connection
            xhr.open("POST", "login-admin.php", true);
            // Pass the Data
            xhr.onload = function () {
                if (this.status === 200) {
                    // Read the response from PHP
                    const result = JSON.parse(xhr.responseText);
                    console.log(result);
                    if (result.response == "success") {
                        Swal.fire(
                            "Login Correcto!",
                            `Bienvenido (a) ${result.name}`,
                            "success"
                        ).then((result) => {
                            window.location.href = "adminArea.php";
                        });
                    } else {
                        Swal.fire(
                            "Error!",
                            "El Usuario o contraseña es Incorrecto",
                            "error"
                        );
                    }
                }
            };
            // Send the data
            xhr.send(dataAdmin);
        });
    }); // DOM CONTENT LOADED
})();