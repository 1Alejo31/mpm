function login() {
    recuerdame();
    let usu = document.querySelector('#text_user').value;
    let pass = document.querySelector('#text_pass').value;

    if (usu.length == 0 || pass.length == 0) {
        return Swal.fire("Mensaje de arvertencia", "Por favor llenar campos vacios", "warning");
    }

    return new Promise(() => {
        const data = {
            user: usu,
            password: pass,
            login: '1'
        }

        const requestOptions = {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify(data)
        }

        const url = 'crontroller/login/loginController.php';

        fetch(url, requestOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error('El archivo no fue encontrado');
                }
                return response.json();
            })
            .then(jsonResponse => {
                if (jsonResponse.status == "1") {
                    window.location = 'view/index.php';
                } else if (jsonResponse.status == "0") {
                    return Swal.fire({
                        icon: 'warning',
                        title: 'Mensaje de advertencia',
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


function recuerdame() {
    if (rmcheck.checked && usuarioImput.value != "" && passImput.value != "") {
        localStorage.user = usuarioImput.value;
        localStorage.pass = passImput.value;
        localStorage.checkbox = rmcheck.value;
    } else {
        localStorage.user = "";
        localStorage.pass = "";
        localStorage.checkbox = "";
    }
}