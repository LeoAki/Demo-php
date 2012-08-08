<?php


/**
 * Description of Usuario
 *
 * @author leoaki
 */
require_once 'Coneccion.php';

class Usuario extends Coneccion {
    public $TABLA="woo.usuario";
    private $ID=0;
    private $USUARIO="";
    private $PASS="";
    private $EYEBEEN="";
    
    public function getTABLA() {
        return $this->TABLA;
    }
    
    public function setTABLA($TABLA) {
        $this->TABLA = $TABLA;
    }
    
    public function getID() {
        return $this->ID;
    }
    
    public function setID($ID) {
        $this->ID = $ID;
    }
    
    public function getUSUARIO() {
        return $this->USUARIO;
    }
    
    public function setUSUARIO($USUARIO) {
        $this->USUARIO = $USUARIO;
    }
    
    public function getPASS() {
        return $this->PASS;
    }
    
    public function setPASS($PASS) {
        $this->PASS = $PASS;
    }
    
    public function getEYEBEEN() {
        return $this->EYEBEEN;
    }
    
    public function setEYEBEEN($EYEBEEN) {
        $this->EYEBEEN = $EYEBEEN;
    }
    
    public function VALIDAR($usuario,$pass){
        $value=0;
        try{
            $this->CONECTAR();
            $resulset=mysql_query("SELECT * from woo.usuario where usuario='".$usuario."' and password='".$pass."';");
            if($resulset){
                $value= mysql_numrows($resulset);
                IF($value>0){
                    while ($row = mysql_fetch_array($resulset)) {
                        $this->ID=$row[0];
                        $this->USUARIO=$row[1];
                        $this->PASS=$row[2];
                        $this->EYEBEEN=$row[3];
                    }
                    unset ($resulset);
                }
            }

        }catch (Exception $exc) {
            echo "Ups no se pudo conectar por el siguiente error:" . $exc;
        }
        $this->DESTRUIR();
        return $value;
    }

}
?>
