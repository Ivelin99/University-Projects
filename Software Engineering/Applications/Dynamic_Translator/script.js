const socket = io('http://localhost:3000')
const messageContainer = document.getElementById('chatbox')
const messageForm = document.getElementById('send')
const messageInput = document.getElementById('usermsg')

const Name = prompt('Какво е потребителското име на приятеля ви?')
appendMessage('Вие се присъединихте')
socket.emit('new-user', Name)

socket.on('chat-message', data => {
  appendMessage(`${data.Name}: ${data.message}`)
})

socket.on('user-connected', Name => {
  appendMessage(`${Name} се присъедини`)
})

socket.on('user-disconnected', Name => {
  appendMessage(`${Name} излезе от стаята`)
})

messageForm.addEventListener('submit', e => {
  e.preventDefault()
  const message = messageInput.value
  appendMessage(`Вие: ${message}`)
  socket.emit('send-chat-message', message)
  messageInput.value = ''
})

function appendMessage(message) {
  const messageElement = document.createElement('div')
  messageElement.innerText = message
  messageContainer.append(messageElement)
}