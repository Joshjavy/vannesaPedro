document.getElementById('loginmysouvenirsprojec').addEventListener('submit', handleSubmit);
const dashboard = document.querySelector('#loginmysouvenirsprojec').getAttribute('base')

function handleSubmit(event) {
  event.preventDefault();
  const form = document.getElementById('loginmysouvenirsprojec');

  const formData = new FormData(form);

  axios.post(form.action, formData)
    .then(function (response) {
      let datos =response.data;
      console.log(datos)
      if(datos.data){
        window.location = `${dashboard}Home/invitados`
      }else{
        message(datos.message)
      }
      
      
    })
    .catch(function (error) {
      message(error.response.data.message)

    }).
    finally(function(){
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
      </div>
      `,
    showCloseButton: true,
    showCancelButton: false,
    focusConfirm: true,
    confirmButtonText: "Ok",
    confirmButtonColor: "#905F68",
  });
}