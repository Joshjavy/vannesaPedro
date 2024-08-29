let asistencia = document.querySelector('#asistencia')
let noasiste = document.querySelector('#radio_2')
asistencia.addEventListener('submit', handleSubmit);
let radio1 =document.querySelector('#radio_1')
let radio2 =document.querySelector('#radio_2')
radio1.addEventListener('click',()=>{
  asistencia.classList.remove('hidden')
})
radio2.addEventListener('click',()=>{
  asistencia.classList.add('hidden')
})

noasiste.addEventListener('click',()=>{
  let uidh=document.querySelector('#nohuid')
  const formData = new FormData(form);
  formData.append('huid',)
  axios
  .post(`${url}`,formData)
  .then(function (response) {
    console.log(response.data.status);
      const sms=`<p class='text-center'>
          Gracias por tu confirmación.
      </p><br/>
      `
      if(response.data.status){
        message(sms)
      }else{
        message(response.data.message)
      }
      
      
  })
  .catch(function (error) {
      // handle error
      message(error.response.data.message)
  })
  .finally(function () {
    document.querySelector("form[name='asistencia']").reset()
  });
})

function handleSubmit(event) {
  event.preventDefault();
  const form = document.getElementById('asistencia');
  const url = form.action;
  const formData = new FormData(form);
  axios
  .post(`${url}`,formData)
  .then(function (response) {
    console.log(response.data.status);
      const sms=`<p class='text-center'>
          Gracias por tu confirmación.
      </p><br/>
      `
      if(response.data.status){
        message(sms)
      }else{
        message(response.data.message)
      }
      
      
  })
  .catch(function (error) {
      // handle error
      message(error.response.data.message)
  })
  .finally(function () {
    document.querySelector("form[name='asistencia']").reset()
  });


}
const message=(sms)=>{
  Swal.fire({
    title: "",
    type: "",
    html: `
      <div class=" text-center	pt-20">
        ${sms}
        
      </div>
      <div class="flex justify-center pt-7"><img src="src/img/elementos/elemento_stephy.png" class="w-1/4	"/></div>
      `,
    showCloseButton: true,
    showCancelButton: false,
    focusConfirm: true,
    confirmButtonText: "Ok",
    confirmButtonColor: "#905F68",
  });
}