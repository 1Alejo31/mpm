<?php

require('../../model/managmentClient/clientModel.php');

class ClientController{

    function listClient(){
        $listCase = new ClientModel();

        $consultar = $listCase->getListCase();

        if(count($consultar) > 0){
            echo json_encode($consultar);
        }else{
            echo '{
                "sEcho1": "1",
                "iTotalRecords": "0",
                "iTotalDisplayRecords": "0",
                "aaData": []
                }';
        }
    }

}


$controller =  new ClientController();

$data = json_decode(file_get_contents('php://input'), true);

if(isset($_POST['listCase']) && $_POST['listCase'] == '1'){
    $controller->listClient();
}


?>