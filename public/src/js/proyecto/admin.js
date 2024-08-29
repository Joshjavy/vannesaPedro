const liinvitados = document.querySelector('#liinvitados')
const liasistencias = document.querySelector('#liasistencias')

let invitados = document.querySelector('.invitados')
let asistencias = document.querySelector('.asistencias')

liinvitados.addEventListener('click',()=>{
    asistencias.classList.add('hidden')
    invitados.classList.remove('hidden')
})

liasistencias.addEventListener('click',()=>{
    asistencias.classList.remove('hidden')
    invitados.classList.add('hidden')
})