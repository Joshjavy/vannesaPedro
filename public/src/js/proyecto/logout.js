const btnlogut = document.querySelector(".btnsalir");

btnlogut.addEventListener("click", (event) => {
  event.preventDefault();
  handleSubmit();
});
function handleSubmit() {
  const salir = document.querySelector(".btnsalir").getAttribute("base");
  console.log(salir);
  axios
    .post(`${salir}Admin/logout`)
    .then(function (response) {
      let datos = response.data;
      console.log(datos.data);
        window.location = `${salir}Home/login`;
    })
    .catch(function (error) {})
    .finally(function () {});
}
