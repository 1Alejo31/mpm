<?php

require('../../model/conection/common.php');

class CustomerModel extends conectionDB
{

    function getCaseCustomer()
    {

        try {
            session_start();
            $usuario = $_SESSION['S_ID'];

            $conection = self::conectionDb();
            $arreglo = array();
            $sql = "CALL getCase(?)";
            $query = $conection->prepare($sql);
            $query->bindParam(1, $usuario);
            $query->execute();

            $resultado = $query->fetchAll();
            foreach ($resultado as $resp) {
                $arreglo['data'][] = $resp;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        } finally {
            conectionDB::closConection();
            return $arreglo;
        }
    }

    function keepDataCase($atiende, $estado, $notas)
    {
        try {
            session_start();
            $usuario = $_SESSION['S_ID'];

            $conection = self::conectionDb();
            $sql = "CALL SP_KEEP_DATA_CASE(?,?,?,?)";
            $arreglo = array();
            $query = $conection->prepare($sql);
            $query->bindParam(1, $atiende);
            $query->bindParam(2, $estado);
            $query->bindParam(3, $notas);
            $query->bindParam(4, $usuario);
            $query->execute();

            $resultado = $query->fetchAll();
            foreach ($resultado as $resp) {
                $arreglo[] = $resp;
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        } finally {
            conectionDB::closConection();
            return $arreglo;
        }
    }
}
