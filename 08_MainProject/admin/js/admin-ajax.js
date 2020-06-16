(function () {
    "use strict";
    document.addEventListener("DOMContentLoaded", function () {
        // Menu Responsive
        $(".user-panel").on("click", function () {
            $(".hidden").slideToggle();
        });

        $("#save-register").on("submit", function (e) {
            e.preventDefault();

            const nameUser = document.querySelector("#nameUser").value,
                user = document.querySelector("#user").value,
                password = document.querySelector("#password").value,
                stateAdmin = document.querySelector("#state-admin").value;

            // Start AJAX
            const dataAdmin = new FormData();
            dataAdmin.append("nameUser", nameUser);
            dataAdmin.append("user", user);
            dataAdmin.append("password", password);
            dataAdmin.append("state-admin", stateAdmin);

            if (stateAdmin === "update") {
                const id_register = document.querySelector("#id_register")
                    .value;
                dataAdmin.append("id_register", id_register);
            }

            // Create the object
            const xhr = new XMLHttpRequest();
            // Open the connection
            xhr.open("POST", "model-admin.php", true);
            // Pass the Data
            xhr.onload = function () {
                if (this.status === 200) {
                    // Read the response from PHP
                    const result = JSON.parse(xhr.responseText);
                    console.log(result);
                    if (result.response == "correct") {
                        Swal.fire(
                            "Correcto!",
                            "El Usuario se añadió exitosamente",
                            "success"
                        );
                        setTimeout(() => {
                            window.location.href = "adminArea.php";
                        }, 2000);
                    } else if (result.response == "update") {
                        Swal.fire(
                            "Correcto!",
                            "El Usuario se actualizó exitosamente",
                            "success"
                        );
                        setTimeout(() => {
                            window.location.href = "adminArea.php";
                        }, 2000);
                    } else {
                        Swal.fire("Error!", "El Usuario no se añadió", "error");
                    }
                }
            };
            // Send the data
            xhr.send(dataAdmin);
        });

        $(".delete-register").on("click", function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Estas Seguro?",
                text: "No vas a poder devolver esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Si, Borrarlo!",
            }).then((result) => {
                if (result.value) {
                    const id = $(this).attr("data-id");
                    const tipo = $(this).attr("data-tipo");

                    // Start AJAX
                    const dataAdmin = new FormData();
                    dataAdmin.append("id_delete", id);
                    dataAdmin.append("state-admin", "delete");

                    // Create the object
                    const xhr = new XMLHttpRequest();
                    const url = `model-${tipo}.php`;
                    // Open the connection
                    xhr.open("POST", url, true);
                    // Pass the Data
                    xhr.onload = function () {
                        if (this.status === 200) {
                            // Read the response from PHP
                            const result = JSON.parse(xhr.responseText);
                            if(result.response === "delete"){
                                jQuery(`[data-id=${result.id_delete}]`)
                                .parents("tr")
                                .remove();
                                Swal.fire(
                                    "Eliminado!",
                                    "El usuario ha sido eliminado.",
                                    "success"
                                );
                            } else {
                                Swal.fire(
                                    "No Eliminado!",
                                    "Hubo un error en el proceso.",
                                    "error"
                                );
                            }
                        }
                    };
                    // Send the data
                    xhr.send(dataAdmin);
                }
            });
        });

        $("#create-admin").attr("disabled", true);
        $("#repetir_password").on("input", function () {
            var newPass = document.querySelector("#password").value;
            if (this.value === newPass) {
                $("#result_password").text("Correcto");
                $("#create-admin").attr("disabled", false);
            } else {
                $("#result_password").text("No son Iguales!");
            }
        });
    }); // DOM CONTENT LOADED
})();
