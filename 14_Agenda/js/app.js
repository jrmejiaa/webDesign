// Global Variables
const formContact = document.querySelector('#contacto');
listContacts = document.querySelector('#listado-contactos tbody');

(function () {
     'use strict';
     document.addEventListener('DOMContentLoaded', function () {

          eventListener();

          function eventListener() {
               // When the form is created or edited
               formContact.addEventListener('submit', leerFormulario);
          }

          function leerFormulario(e) {
               e.preventDefault();

               // Read the data from the inputs
               const nombre = document.querySelector('#nombre').value,
                    empresa = document.querySelector('#empresa').value,
                    telefono = document.querySelector('#telefono').value,
                    accion = document.querySelector('#accion').value;

               if (nombre === "" || empresa === "" || telefono === "") {
                    showNotification('Todos los campos son Obligatorios', 'error');
               } else {
                    // Start AJAX 
                    const infoContact = new FormData();
                    infoContact.append('nombre', nombre);
                    infoContact.append('empresa', empresa);
                    infoContact.append('telefono', telefono);
                    infoContact.append('accion', accion);

                    if (accion === 'crear') {
                         // Create a new Contact
                         insertDB(infoContact);
                    } else {
                         // Edit a contact
                    }
               }
          }

          // Insert in the DataBase using AJAX
          function insertDB(data) {
               // Call to AJAX

               // Create the object 
               const xhr = new XMLHttpRequest();
               // Open the connection
               xhr.open('POST', 'inc/modelos/modelo-contactos.php', true);
               // Pass the Data
               xhr.onload = function () {
                    if (this.status === 200) {
                         console.log(xhr.responseText);
                         // Read the response from PHP
                         const response = JSON.parse(xhr.responseText);
                         // Insert new element in the table
                         const newContact = document.createElement('tr');

                         newContact.innerHTML = `
                              <td>${response.data.nombre}</td>
                              <td>${response.data.empresa}</td>
                              <td>${response.data.telefono}</td>
                         `;
                         // Create a container to the buttons
                         const containerActions = document.createElement('td');

                         // Create the icon to edit
                         const iconEdit = document.createElement('i');
                         iconEdit.classList.add('fas', 'fa-pen-square');
                         // Create the link to Edit
                         const buttonEdit = document.createElement('a');
                         buttonEdit.appendChild(iconEdit);
                         buttonEdit.href = `editar.php?id=${response.id_inserted}`;
                         buttonEdit.classList.add('btn-editar', 'btn');
                         // Add to the father
                         containerActions.appendChild(buttonEdit);

                         // Create the Delete Icon
                         const iconDelete = document.createElement('i');
                         iconDelete.classList.add('fas', 'fa-trash-alt');
                         // Create the link to Edit
                         const buttonDelete = document.createElement('button');
                         buttonDelete.appendChild(iconDelete);
                         buttonDelete.setAttribute('data-id', response.id_inserted);
                         buttonDelete.href = `editar.php?id=${response.id_inserted}`;
                         buttonDelete.classList.add('btn-borrar', 'btn');
                         // Add to the father
                         containerActions.appendChild(buttonDelete);

                         // Add to tr HTML
                         newContact.appendChild(containerActions);

                         // Add to the list of Contacts
                         listContacts.appendChild(newContact);
                         
                         // Reset form 
                         document.querySelector('form').reset();

                         // Pass the validation create the AJAX
                         showNotification('Contacto Editado correctamente', 'correcto');

                    }
               }
               // Send the data
               xhr.send(data);
               // Read the errors
          }

          function showNotification(message, classNotification) {
               const notification = document.createElement('div');
               notification.classList.add(classNotification, 'notificacion', 'sombra');

               notification.textContent = message;

               // Form div to make the message of error
               formContact.insertBefore(notification, document.querySelector('form legend'));

               // Hide and Show the notification
               setTimeout(() => {
                    notification.classList.add('visible');
                    setTimeout(() => {
                         notification.classList.remove('visible');
                         setTimeout(() => {
                              notification.remove();
                         }, 1000);
                    }, 3000);
               }, 100);
          }

     }); // DOM CONTENT LOADED
})();