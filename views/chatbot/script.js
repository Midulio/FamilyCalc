document.addEventListener('DOMContentLoaded', () => {
const chatMessages = document.getElementById('chat-messages');

const responses = {
'horario': 'Nuestro horario de atención es de lunes a viernes, de 9:00 a.m. a 6:00 p.m.',
'contacto': 'Puedes contactarnos a través de nuestro correo electrónico: info@empresa.com o llamando al 555-1234.',
'productos': 'Ofrecemos una amplia gama de productos, incluyendo [Producto A], [Producto B] y [Producto C]. Visita nuestra sección de productos para más detalles.',
'ayuda': 'Si necesitas más ayuda, por favor, describe tu problema y un representante se pondrá en contacto contigo lo antes posible.',
'default': 'Lo siento, no entiendo esa pregunta. Por favor, selecciona una de las opciones o reformula tu consulta.'
};

function addMessage(message, sender) {
const messageDiv = document.createElement('div');
messageDiv.classList.add('message', sender === 'user' ? 'user-message' : 'bot-message');
messageDiv.textContent = message;
chatMessages.appendChild(messageDiv);
chatMessages.scrollTop = chatMessages.scrollHeight;
}

function handleOptionClick(event) {
const userQuestion = event.target.textContent;
const dataQuestion = event.target.getAttribute('data-question');

addMessage(userQuestion, 'user');

const botResponse = responses[dataQuestion] || responses.default;

setTimeout(() => {
addMessage(botResponse, 'bot');
}, 500);
}

const optionButtons = document.querySelectorAll('.option-button');
optionButtons.forEach(button => {
button.addEventListener('click', handleOptionClick);
});
});
