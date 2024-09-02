<?php

require('../../model/customerManagement/customerModel.php');

class CustomerController
{
    function getCase()
    {
        $customer = new customerModel();

        $consulta = $customer->getCaseCustomer();
        if ($consulta['data'][0][0] == 0) {
            $response = [
                'mensaje' => 'Se tomo un registro',
                'status' => '0'
            ];
        } else {
            $response = [
                'mensaje' => 'Se tomo un registro',
                'status' => '1',
                'data' => $consulta
            ];
        }

        echo json_encode($response);
        exit;
    }

    function keepData($atiende, $estado, $notas)
    {
        $keepDataCase = new CustomerModel();

        $consulta = $keepDataCase->keepDataCase($atiende, $estado, $notas);
        if (count($consulta) > 0) {
            $response = [
                'mensaje' => 'Valores recibidos y procesado correctamente',
                'status' => '1'
            ];
        } else {
            $response = [
                'mensaje' => 'No se pudo realizar la inserción',
                'status' => '0'
            ];
        }
        echo json_encode($response);
        exit;
    }
}

$controller = new CustomerController();

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['getCase'])) {
    $controller->getCase();
}

if (isset($data['keepData'])) {

    $atiende  = htmlspecialchars($data['atiende'], ENT_QUOTES, 'UTF-8');
    $estado = htmlspecialchars($data['estado'], ENT_QUOTES, 'UTF-8');
    $notas = htmlspecialchars($data['notas'], ENT_QUOTES, 'UTF-8');

    $controller->keepData($atiende, $estado, $notas);
}
