(function(){
	'use strict';
	document.addEventListener('DOMContentLoaded', function(){
		// It uses to run the JavaScript after all the HTML code has deployed
		
		// getElementById - To find an object using this ID
		const logo = document.getElementById("logo");
		const navigation = document.getElementById("navegacion");
		
		// getElementsByClassName
		const nav = document.getElementsByClassName("navegacion");
		
		// It is going to take all the elements with the tag of HTML 
		const links = document.getElementsByTagName("a");

		for (let i = 0; i < links.length; i++) {
			const element = links[i];
			element.setAttribute("target", "_blank");
		}

		const links_sidebar = document.getElementById("sidebar").getElementsByTagName("a");
		// console.log(links_sidebar);

		for (let i = 0; i < links_sidebar.length; i++) {
			const element = links_sidebar[i];
			element.setAttribute("href","https://www.google.com");
		}

		// querySelector use, it is the same as CSS which is really useful compare with the other ones
		const logo_query = document.querySelector("#logo");

		const header = document.querySelectorAll("h2");
		// console.log(header[0].innerText);

		// Create a new element in the sidebar
		const sidebar = document.querySelector("#sidebar");
		const newElement = document.createElement("H1");
		const newText = document.createTextNode("Hello World :D");
		// Adding the new element to the sidebar
		newElement.appendChild(newText);
		sidebar.appendChild(newElement);
		
		// Agregar Entrada 6:
		var enlacesSidebar = document.querySelectorAll('#sidebar ul');
		// creando el enlace
		var nuevoEnlace = document.createElement('A');
		nuevoEnlace.setAttribute('href', 'http://www.google.com');
		var textoEnlace = document.createTextNode('Entrada 6');
		nuevoEnlace.appendChild(textoEnlace);
		// creando la lista
		var nuevaLista = document.createElement('LI');
		nuevaLista.appendChild(nuevoEnlace);
		// lo agregamos al menu
		enlacesSidebar[0].appendChild(nuevaLista);

		// Clonar nodo
		var contenido = document.querySelectorAll('main');
		var nuevoContenido = contenido[0].cloneNode(true);

		var sidebar = document.querySelector('aside');

		sidebar.insertBefore(nuevoContenido, sidebar.childNodes[5]);
		
		/* Creando lista de post populares**/
		var sidebar = document.querySelector('aside');

		var masVisitados = document.createElement('H2');
		var textoVisitados = document.createTextNode('Post más visitados');
		masVisitados.appendChild(textoVisitados);
		sidebar.insertBefore(masVisitados, sidebar.childNodes[0] );
				
		var contenido = document.querySelectorAll('main h2');

		for(var i = 0; i < contenido.length; i++) {
			var nuevoElemento = document.createElement('LI');
			var nuevoTexto = document.createTextNode(contenido[i].firstChild.nodeValue);
			nuevoElemento.appendChild(nuevoTexto);
			sidebar.insertBefore(nuevoElemento, sidebar.childNodes[1]);
		}

		// eliminar nodos
		var primerPost = document.querySelector('main article');
		console.log(primerPost);

		primerPost.parentNode.removeChild(primerPost);

		var enlaces =document.querySelectorAll('#navegacion nav ul li a')[10];
		console.log(enlaces);
		enlaces.parentNode.removeChild(enlaces);
	
		var viejoNodo = document.querySelector('main h2');
		var nuevoNodo = document.querySelector('footer h2');
		viejoNodo.parentNode.replaceChild(nuevoNodo, viejoNodo);

		// Reemplazar nodo con uno nuevo.
		var nuevoTitulo = document.createElement('H2');
		var nuevoTexto =document.createTextNode('Hola Mundo');
		nuevoTitulo.appendChild(nuevoTexto);

		var viejoNodo = document.querySelector('main h2');
		viejoNodo.parentNode.replaceChild(nuevoTitulo, viejoNodo);
	});
})();
