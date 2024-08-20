<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="supplier/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="supplier/assets/img/favicon.png">
    <title>
        SISTEMA DE CAPTACIÓN DE CLIENTES
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="supplier/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="supplier/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="supplier/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('supplier/assets/img/fondo.png');">
            <span class="mask opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto" style="background-color: #ffffffd2; border-radius: 3%;">
                        <div class="z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-2 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0"><img src="supplier/assets/img/logo.png" width="35%" alt=""></h4>
                                    <h6 class="text-white font-weight-bolder text-center mt-2 mb-0">MPM DE COLOMBIA</h6>
                                    <div class="row mt-3">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form" class="text-start">
                                    <div id="user" class="input-group input-group-outline my-3">
                                        <label class="form-label">Usuario</label>
                                        <input id="text_user" type="email" class="form-control">
                                    </div>
                                    <div id="pass" class="input-group input-group-outline mb-3">
                                        <label class="form-label">Contraseña</label>
                                        <input id="text_pass" type="password" class="form-control">
                                    </div>
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="remember">
                                        <label class="form-check-label mb-0 ms-3" for="remember">Recordar</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2" onclick="login()">Ingresar</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Olvidaste la contraseña?
                                        <a href="../pages/sign-up.html" class="bg-gradient-primary text-gradient font-weight-bold">Sign up</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                Realizado por Development one click
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="supplier/assets/js/core/popper.min.js"></script>
    <script src="supplier/assets/js/core/bootstrap.min.js"></script>
    <script src="supplier/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="supplier/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="supplier/assets/js/material-dashboard.min.js?v=3.1.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/login/login.js"></script>
    <script>
        const rmcheck = document.querySelector("#remember"),
            usuarioImput = document.querySelector("#text_user"),
            passImput = document.querySelector("#text_pass");

        if (localStorage.checkbox && localStorage.checkbox != '') {
            rmcheck.setAttribute("checked", "checked");
            usuarioImput.value = localStorage.user;
            document.querySelector('#user').removeAttribute('class');
            document.querySelector('#user').setAttribute('class', 'input-group input-group-outline my-3 focused is-focused')
            passImput.value = localStorage.pass;
            document.querySelector('#pass').removeAttribute('class');
            document.querySelector('#pass').setAttribute('class', 'input-group input-group-outline my-3 focused is-focused')
        } else {
            rmcheck.removeAttribute("checked", "checked");
            usuarioImput.value = '';
            passImput.value = '';
        }
    </script>
</body>

</html>