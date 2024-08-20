<?php

require('../../model/conection/common.php');

class  LoginModel extends conectionDB
{

    public function login($usu, $pass)
    {
        $passw = EnCrypt($pass);
        $conection = self::conectionDb();
        $sql = "CALL SP_VERIFICAR_USUARIO(?,?)";
        $arreglo = array();
        $query = $conection->prepare($sql);
        $query->bindParam(1, $usu);
        $query->bindParam(2, $passw);
        $query->execute();

        $resultado = $query->fetchAll();
        foreach ($resultado as $resp) {
            $arreglo[] = $resp;
        }

        conectionDB::closConection();
        return $arreglo;
    }
}
