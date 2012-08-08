<?php

/**
 * Description of Coneccion
 *
 * @author leoaki
 */
class Coneccion {
    private $server;
    private $db;
    private $user;
    private $pass;
    public $cone;

    public function CONECTAR(){
        $this->server="namehost";
        $this->db="namedb";
        $this->user="root";
        $this->pass="password";
        $this->cone=mysql_connect($this->server, $this->user, $this->pass) or die(mysql_error());
        mysql_query("SET NAME 'utf8'");
        mysql_select_db($this->db,$this->cone) or die (mysql_error());
        return $this->cone;
     }

     public function CERRAR(){
         mysql_close($this->cone) or die(mysql_error());
     }

     public function DESTRUIR(){
         session_destroy();
     }

     public function CONSULTA($consulta){
         return mysql_query($consulta);
     }
}

?>
