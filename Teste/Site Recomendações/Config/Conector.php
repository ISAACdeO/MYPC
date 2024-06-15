<?php


class Conexao {
    private static $Conexao;

    public static function Conecta()
    {

        $host = 'localhost';
        $dbname = 'bdmypc';
        $username = 'root';
        $password = 'root';
        try {
            if(!isset(self::$Conexao)):
            self::$Conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            self::$Conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        endif;
            return self::$Conexao;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
?>