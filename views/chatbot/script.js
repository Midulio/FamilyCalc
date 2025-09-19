document.addEventListener('DOMContentLoaded', () => { // Espera a que cargue todo el DOM
    const chatMessages = document.getElementById('chat-messages'); // Obtiene el contenedor de mensajes

    const responses = { // Respuestas predefinidas del chatbot
        'horario': 'Nuestro horario de atención es de lunes a viernes, de 9:00 a.m. a 6:00 p.m.', // Respuesta para "horario"
        'contacto': 'Puedes contactarnos a través de nuestro correo electrónico: info@empresa.com o llamando al 555-1234.', // Respuesta contacto
        'servicio': 'Esta página es una CALCULADORA DE GASTOS FAMILIAR. Permite saber cuánto GASTA la FAMILIA en el MES, tanto en TOTAL como de manera INDIVIDUAL. También muestra en qué se GASTA el DINERO, ya sea en GENERAL o por PERSONA. Además, informa los PRECIOS de algunos SERVICIOS DE STREAMING y el valor del DÓLAR con sus variantes: PESO CHILENO, PESO URUGUAYO, REAL BRASILERO y EURO.', // Respuesta servicios
        'ayuda': 'Si necesitas más ayuda, por favor, describe tu problema y un representante se pondrá en contacto contigo lo antes posible.', // Respuesta ayuda
        'default': 'Lo siento, no entiendo esa pregunta. Por favor, selecciona una de las opciones o reformula tu consulta.' // Respuesta por defecto
    };

    function addMessage(message, sender) { // Función que agrega mensajes al chat
        const messageDiv = document.createElement('div'); // Crea un contenedor para cada mensaje
        messageDiv.classList.add('message-wrapper'); // Clase para organizar los mensajes

        if (sender === 'bot') { // Si el mensaje es del BOT
            messageDiv.innerHTML = ` 
                <div class="chat-row">
                    <img src="../../src/bot.gif" alt="bot" class="bot-img"> <!-- Imagen del bot -->
                    <div class="message bot-message">${message}</div> <!-- Texto del bot -->
                </div>
            `;
        } else { // Si el mensaje es del USUARIO
            messageDiv.innerHTML = `
                <div class="chat-row user-row">
                    <div class="message user-message">${message}</div> <!-- Texto del usuario -->
                    <img src="../../src/user-circle.svg" alt="user" class="user-img"> <!-- Imagen del usuario -->
                </div>
            `;
        }

        chatMessages.appendChild(messageDiv); // Agrega el mensaje al contenedor principal
        chatMessages.scrollTop = chatMessages.scrollHeight; // Hace scroll automático al último mensaje
    }

    function handleOptionClick(event) { // Maneja el clic en un botón de opción
        const userQuestion = event.target.textContent; // Obtiene el texto que eligió el usuario
        const dataQuestion = event.target.getAttribute('data-question'); // Obtiene el atributo data-question

        addMessage(userQuestion, 'user'); // Muestra el mensaje del usuario en pantalla

        const botResponse = responses[dataQuestion] || responses.default; // Selecciona la respuesta del bot

        setTimeout(() => { // Espera medio segundo antes de responder
            addMessage(botResponse, 'bot'); // Muestra la respuesta del bot
        }, 500);
    }

    const optionButtons = document.querySelectorAll('.option-button'); // Selecciona todos los botones de opción
    optionButtons.forEach(button => { // Recorre todos los botones
        button.addEventListener('click', handleOptionClick); // Asigna evento de clic para cada botón
    });
}); // Cierra el DOMContentLoaded