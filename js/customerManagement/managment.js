function openComment(){
  $("#comment").modal({backdrop: 'static', keyboard: false});
  $("#comment").modal('show');
}

function getCase(){
  return new Promise(() => {
    const data = {
        getCase: '1'
    }

    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
        body: JSON.stringify(data)
    }

    const url = '../crontroller/customerManagement/customerController.php';

    fetch(url, requestOptions)
        .then(response => {
            if (!response.ok) {
                throw new Error('El archivo no fue encontrado');
            }
            return response.json();
        })
        .then(jsonResponse => {
          if (jsonResponse.status == "1") {
            console.log(jsonResponse.data.data[0]);
            document.querySelector('#text_nom_empr').textContent = jsonResponse.data.data[0][1];
            document.querySelector('#text_dire').textContent = jsonResponse.data.data[0][2];
            document.querySelector('#text_tel').textContent = jsonResponse.data.data[0][3];
            document.querySelector('#text_lunes').textContent = jsonResponse.data.data[0][5];
            document.querySelector('#text_martes').textContent = jsonResponse.data.data[0][6];
            document.querySelector('#text_miercoles').textContent = jsonResponse.data.data[0][7];
            document.querySelector('#text_jueves').textContent = jsonResponse.data.data[0][8];
            document.querySelector('#text_viernes').textContent = jsonResponse.data.data[0][9];
            document.querySelector('#text_sabado').textContent = jsonResponse.data.data[0][10];
            document.querySelector('#text_domingo').textContent = jsonResponse.data.data[0][11];
          } else if (jsonResponse.status == "2") {
              return Swal.fire({
                  icon: 'warning',
                  title: 'No hay casos para gestionar',
                  text: jsonResponse.mensaje,
                  heigthAuto: false,
              });
          }else{
            window.location.reload();
          }
        })
        .catch(function (error) {
            alert(error.message);
            console.log(error);
        });
});

}

document.addEventListener('DOMContentLoaded', function(){
  getCase();
})

function keepData(){

  var text_atiende = document.querySelector('#text_atiende').value;
  var text_estado = document.querySelector('#text_estado').value;
  var notas = document.querySelector('#text_notas').value;

  if (text_atiende.length == 0 || text_estado.length == 0 || notas.length == 0) {
    return Swal.fire("Mensaje de arvertencia", "Por favor llenar campos vacios", "warning");
  }

  return new Promise(() => {
    const data = {
        atiende: text_atiende,
        estado: text_estado,
        notas: notas,
        keepData: '1'
    }

    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
        body: JSON.stringify(data)
    }

    const url = '../crontroller/customerManagement/customerController.php';

    fetch(url, requestOptions)
        .then(response => {
            if (!response.ok) {
                throw new Error('El archivo no fue encontrado');
            }
            return response.json();
        })
        .then(jsonResponse => {
          if (jsonResponse.status == "1") {
            Swal.fire({
              icon: 'success',
              title: 'Información',
              text: 'Gestionado de forma exitosa',
              heigthAuto: false,
              confirmButtonText: 'Continuar',
          }).then((result) => {
              if (result.isConfirmed) {
                window.location.reload();
              }else{
                window.location.reload();
              }
          });
          } else if (jsonResponse.status == "2") {
              return Swal.fire({
                  icon: 'warning',
                  title: 'no se pudo realizar el registro',
                  text: jsonResponse.mensaje,
                  heigthAuto: false,
              });
          }
        })
        .catch(function (error) {
            alert(error.message);
            console.log(error);
        });
});

}