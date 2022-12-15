// Modo dark

const html = document.querySelector('html');
const lua = document.querySelector('.lua');
const sol = document.querySelector('.sol');


lua.addEventListener('click', () => {
    html.classList.toggle('dark');
})

sol.addEventListener('click', () => {
    html.classList.remove('dark');
})

// Mostrar senha

var senha = document.getElementById("senha");

function mostrar(){
  if(senha.type == "password"){
    senha.type="text";
  }
  else{
    senha.type="password";
  }
}