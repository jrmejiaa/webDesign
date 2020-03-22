// GLOBALS VARIABLES
const gift = document.getElementById("gift");

(function(){
    'use strict';
    document.addEventListener('DOMContentLoaded', function(){
        // It uses to run the JavaScript after all the HTML code has deployed

        // Get the name of the page
        const fileName = location.pathname.split("/").slice(-1)[0]

        // HOME PAGE
        if(fileName == "index.html"){
            // Map 
            let map = L.map('map').setView([5.826563, -73.033499], 18);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([5.826563, -73.033499]).addTo(map)
                .bindPopup('GDLWebcamp 2020 <br> Boletos ya disponibles!')
                .openPopup();
        
        }else if(fileName == "registro.html"){
        // REGISTRO PAGE

            // Field user data
            const nameUser = document.getElementById("nameUser");
            const lastName = document.getElementById("lastName");
            const email = document.getElementById("email");

            // Field for pass 
            const completeEvent = document.getElementById("eventos");
            const dayPass = document.getElementById("dayPass");
            const allPass = document.getElementById("allPass");
            const day2Pass = document.getElementById("day2Pass");

            // Buttons and div
            const calcular = document.getElementById("calcular");
            const errorDiv = document.getElementById("error");
            const completeTotal = document.getElementById("completeTotal");
            const listProduct = document.getElementById("productList");
            const totalSum = document.getElementById("totalSum");

            // Extras
            const shirtEvent = document.getElementById("shirtEvent");
            const etiquetas = document.getElementById("etiquetas");

            // EventListener to make the compute of the shopping
            calcular.addEventListener('click', computeShopping);

            // EventListener to see which Pass are selected
            dayPass.addEventListener("blur", showCalendar);
            allPass.addEventListener("blur", showCalendar);
            day2Pass.addEventListener("blur", showCalendar);

            // Validation Form
            nameUser.addEventListener('blur', checkInformation);
            lastName.addEventListener('blur', checkInformation);
            email.addEventListener('blur', checkInformation);
            email.addEventListener('blur', checkEmail);
        
            // FUNCTIONS
            function computeShopping(event){
                // It is necessary to have this line to not execute the function until the EventListener works
                event.preventDefault();
                if(gift.value == ""){
                    alert("Debes Elegir un Regalo");
                    // Puts the cursor in the option
                    gift.focus();
                }else{
                    let ticketsDay = dayPass.value,
                        ticketAllDay = allPass.value,
                        ticket2Days = day2Pass.value,
                        countTShirt = shirtEvent.value,
                        countEtiquetas = etiquetas.value;
                        
                    let totalPay = (ticketsDay * 30) + (ticketAllDay * 50) + (ticket2Days * 45) + ((countTShirt * 10)*0.93) + (countEtiquetas * 2);
                    
                    let productList = [];
                    if(ticketsDay > 0){
                        productList.push(`Pase por día: \t<span>${ticketsDay}</span>`);
                    }
                    if(ticket2Days > 0){
                        productList.push(`Pase por 2 días: \t<span>${ticket2Days}</span>`);
                    }
                    if(ticketAllDay >0){
                        productList.push(`Pase por todo la Conferencia: \t<span>${ticketAllDay}</span>`);
                    }
                    if(countTShirt >0){
                        productList.push(`Tus Camisetas: \t<span>${countTShirt}</span>`);
                    }
                    if(countEtiquetas >0){
                        productList.push(`Tus Etiquetas: \t<span>${countEtiquetas}</span>`);
                    }
                    // Display ON or OFF
                    if(ticketsDay + ticket2Days + ticketAllDay> 0){
                        completeTotal.style.display = "block";
                    }else {
                        completeTotal.style.display = "none";
                    }
                    listProduct.innerHTML = "";
                    for (let i = 0; i < productList.length; i++) {
                        listProduct.innerHTML += `${productList[i]} <br>`;
                    }
                    totalSum.style.display = "block";
                    totalSum.innerHTML = `TOTAL: <span>$ ${totalPay}</span>`;
                }
            }

            function showCalendar() {
                let ticketsDay = dayPass.value,
                    ticketAllDay = allPass.value,
                    ticket2Days = day2Pass.value;
                
                let dayElect = [];
                
                // Start Over when new event comes
                completeEvent.style.display = "none";
                document.getElementById("viernes").style.display = "none";
                document.getElementById("sabado").style.display = "none";
                document.getElementById("domingo").style.display = "none";
                
                if(ticketsDay>0){
                    dayElect.push('viernes');
                    completeEvent.style.display = "block";
                }
                if(ticket2Days>0){
                    dayElect.push('viernes','sabado');
                    completeEvent.style.display = "block";
                }
                if(ticketAllDay>0){
                    dayElect.push('viernes','sabado','domingo');
                    completeEvent.style.display = "block";
                }
                
                for (let i = 0; i < dayElect.length; i++) {
                    document.getElementById(dayElect[i]).style.display = "block";
                }
            }

            function checkInformation() {
                if(this.value == ""){
                    errorDiv.style.display = "block";
                    errorDiv.innerHTML = "Este Campo es Obligatorio *";
                    this.style.border = "0.1rem solid red";
                    errorDiv.style.color = "red";
                }else{
                    errorDiv.style.display = "none";
                    this.style.border = "none";
                }
            }

            function checkEmail() {
                if(this.value.indexOf("@") > -1){
                    errorDiv.style.display = "none";
                    this.style.border = "none";
                }else{
                    errorDiv.style.display = "block";
                    errorDiv.innerHTML = "Debe ser un correo valido *";
                    this.style.border = "0.1rem solid red";
                    errorDiv.style.color = "red";
                }
            }
        }
    }); // DOM CONTENT LOADED
})();
