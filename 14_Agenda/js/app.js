// Global Variables
const     formContact = document.querySelector('#contacto'),
          listContacts = document.querySelector('#listado-contactos tbody'),
          inputSearcher = document.querySelector('#buscar');

(function () {
     'use strict';
     document.addEventListener('DOMContentLoaded', function () {

          eventListener();

          function eventListener() {
               // When the form is created or edited
               formContact.addEventListener('submit', leerFormulario);
               // Listener to delete 
               if(listContacts){
                    // Listener to eliminate button
                    listContacts.addEventListener('click',deleteContact);
               }
               // Listener to inputSearcher
               inputSearcher.addEventListener('input',searchContacts);
               // Show Contacts Visible
               numberContacts();
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
                         const idRegistered = document.querySelector('#id').value;
                         infoContact.append('id_contacto',idRegistered);
                         updateRegister(infoContact);
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
                         buttonEdit.href = `editar.php?id_contacto=${response.id_inserted}`;
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

                         // Update Number of Contacts
                         numberContacts();

                    }
               }
               // Send the data
               xhr.send(data);
               // Read the errors
          }

          function updateRegister(data) {
               // AJAX Call
               const xhr = new XMLHttpRequest();
               
               xhr.open('POST','inc/modelos/modelo-contactos.php',true);

               xhr.onload = function() {
                    if(this.status === 200){
                         const response = JSON.parse(xhr.responseText);
                         console.log(response);
                         if(response.respuesta === "correcto"){
                              showNotification('El contacto fue Actualizado','correcto');
                         }else{
                              showNotification('Hubo un error...','error');
                         }
                    }
                    // After three seconds go to index again
                    setTimeout(() => {
                         window.location.href = "index.php";
                    }, 4000);
               }

               xhr.send(data);
          }

          function deleteContact(e) {
               const target = e.target.parentElement.classList.contains('btn-borrar');
               // If the target is the trash
               if(target){
                    const id = e.target.parentElement.getAttribute('data-id');
                    // Ask the user if it is secure of the action
                    const response = confirm('¿Estas seguro de que quieres borrar?')
                    if(response){
                         // Call to AJAX
                         const xhr = new XMLHttpRequest();
                         console.log(`inc/modelos/modelo-contactos.php?id_contacto=${id}&accion=borrar`);
                         xhr.open('GET',`inc/modelos/modelo-contactos.php?id_contacto=${id}&accion=borrar`,true);

                         xhr.onload = function(){
                              if(this.status === 200){
                                   const result = JSON.parse(xhr.responseText);
                                   if(result.respuesta === "correcto"){
                                        // Delete the register from DOM
                                        e.target.parentElement.parentElement.parentElement.remove();
                                        // Show notificacion
                                        showNotification("Contacto Eliminado",'correcto');
                                        // Update Number of Contacts
                                        numberContacts();
                                   }else{
                                        // Show the message 
                                        showNotification("Hubo un error...",'error');
                                   }
                              }
                         }
                         xhr.send();
                    }
               }
          }

          function searchContacts(e) {
               const expression = new RegExp(e.target.value, "i"),
                     registers = document.querySelectorAll('tbody tr');
               
               
               registers.forEach(register => {
                    register.style.display = "none";

                    if(register.childNodes[1].textContent.replace(/\s/g, " ").search(expression) != -1){
                         register.style.display = "table-row";
                    }
                    numberContacts();
               });      
          }

          function numberContacts() {
               const totalContacts = document.querySelectorAll('tbody tr'),
                     containerNumber = document.querySelector('.total-contactos span');
               let total = 0;

               totalContacts.forEach(contact =>{
                    if(contact.style.display === '' || contact.style.display === "table-row"){
                         total++;
                    }
               })

               containerNumber.textContent = total;
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