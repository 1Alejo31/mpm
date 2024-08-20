<?php

require('../../model/login/loginModel.php');

class LoginController
{

    function loginController($user, $pass)
    {
        $login = new LoginModel();

        $consulta = $login->login($user, $pass);

        if (count($consulta) > 0) {

            session_start();

            $_SESSION['S_ID'] = $consulta[0][0];
            $_SESSION['S_US'] = $consulta[0][1];
            $_SESSION['S_RO'] = $consulta[0][2];

            $response = [
                'mensaje' => 'Valores recibidos y procesado correctamente',
                'status' => '1'
            ];
        } else {
            $response = [
                'mensaje' => 'Error en el usuaro y/o contraseña',
                'status' => '0'
            ];
        }

        echo json_encode($response);
        exit;
    }
}

$controller = new LoginController();

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['login'])) {
    $user = htmlspecialchars($data['user'], ENT_QUOTES, 'UTF-8');
    $pass = htmlspecialchars($data['password'], ENT_QUOTES, 'UTF-8');

    $controller->loginController($user, $pass);
}
