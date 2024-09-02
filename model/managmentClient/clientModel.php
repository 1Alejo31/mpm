<?php
require('../../model/conection/common.php');

class ClientModel extends conectionDB{
    
    public function getListCase(){
        try{
            $connection = self::conectionDB();
            $arreglo = array();
            $sql = 'CALL SP_LIST_CASE()';
            $query = $connection->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultado as $resp){
                $arreglo['data'][] = $resp;
            }
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }finally{
            conectionDB::closConection();
            return $arreglo;
        }
    }

}

?>