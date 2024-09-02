<?php

require('../../crontroller/conection/Class.php');

class conectionDB
{

    private $pdo;
    public function conectionDb()
    {
        try {
            $config = parse_ini_file('../../crontroller/conection/store.ini');
        } catch (\Throwable $th) {
            echo 'Error: no String data found -> ' . $th;
            exit;
        }

        try {
            $dsn = 'mysql:host=' . DeCrypt($config['store']) . ';port=31749; dbname=' . DeCrypt($config['location']);
            $username = DeCrypt($config['arg1']);
            $password = DeCrypt($config['arg2']);
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8 COLLATE utf8_spanish_ci'
            ];

            $this->pdo = new PDO($dsn, $username, $password, $options);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec('SET NAMES utf8');
            return $this->pdo;
        } catch (PDOException $e) {
            echo 'Fallo la conexion: ' . $e->getMessage();
        }
    }

    public function closConection()
    {
        $this->pdo = null;
    }
}
