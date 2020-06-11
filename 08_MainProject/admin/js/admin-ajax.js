(function () {
    "use strict";
    document.addEventListener("DOMContentLoaded", function () {
        $("#create-admin").on("submit", function (e) {
            e.preventDefault();

            const nameUser = document.querySelector("#nameUser").value,
                user = document.querySelector("#user").value,
                password = document.querySelector("#password").value,
                addAdmin = document.querySelector("#add-admin").value;

            // Start AJAX
            const dataAdmin = new FormData();
            dataAdmin.append("nameUser", nameUser);
            dataAdmin.append("user", user);
            dataAdmin.append("password", password);
            dataAdmin.append("add-admin", addAdmin);

            // Create the object
            const xhr = new XMLHttpRequest();
            // Open the connection
            xhr.open("POST", "insert-admin.php", true);
            // Pass the Data
            xhr.onload = function () {
                if (this.status === 200) {
                    // Read the response from PHP
                    const result = JSON.parse(xhr.responseText);
                    console.log(result);
                    if(result.response == "correct"){
                        Swal.fire(
                            'Correcto!',
                            'El Usuario se añadió exitosamente',
                            'success'
                        );
                    } else {
                        Swal.fire(
                            'Error!',
                            'El Usuario no se añadió',
                            'error'
                        );
                    }
                    
                }
            };
            // Send the data
            xhr.send(dataAdmin);
        });

        $("#login-admin").on("submit", function (e) {
            e.preventDefault();

            const user = document.querySelector("#user").value,
                password = document.querySelector("#password").value,
                loginAdmin = document.querySelector("#login-admin-submit").value;

            // Start AJAX
            const dataAdmin = new FormData();
            dataAdmin.append("user", user);
            dataAdmin.append("password", password);
            dataAdmin.append("login-admin", loginAdmin);

            // Create the object
            const xhr = new XMLHttpRequest();
            // Open the connection
            xhr.open("POST", "insert-admin.php", true);
            // Pass the Data
            xhr.onload = function () {
                if (this.status === 200) {
                    // Read the response from PHP
                    const result = JSON.parse(xhr.responseText);
                    console.log(result);
                }
            };
            // Send the data
            xhr.send(dataAdmin);
        });
    }); // DOM CONTENT LOADED
})();
