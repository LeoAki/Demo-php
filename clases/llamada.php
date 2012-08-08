<?php
/**
 * Description of llamada
 *
 * @author leoaki
 */
require_once 'Coneccion.php';
class llamada extends Coneccion {
    private $ID;
    private $ANEXO;
    private $FECHA;
    private $MOVIL;
    private $CONSULTA;
    private $RESPUESTA;
    private $NAME;
    private $EMAIL;
    public static $TABLA="woo.llamada";
public function getNAME() {
    return $this->NAME;
}

public function setNAME($NAME) {
    $this->NAME = $NAME;
}

public function getEMAIL() {
    return $this->EMAIL;
}

public function setEMAIL($EMAIL) {
    $this->EMAIL = $EMAIL;
}


    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getANEXO() {
        return $this->ANEXO;
    }

    public function setANEXO($ANEXO) {
        $this->ANEXO = $ANEXO;
    }

    public function getFECHA() {
        return $this->FECHA;
    }

    public function setFECHA($FECHA) {
        $this->FECHA = $FECHA;
    }

    public function getMOVIL() {
        return $this->MOVIL;
    }

    public function setMOVIL($MOVIL) {
        $this->MOVIL = $MOVIL;
    }

    public function getCONSULTA() {
        return $this->CONSULTA;
    }

    public function setCONSULTA($CONSULTA) {
        $this->CONSULTA = $CONSULTA;
    }

    public function getRESPUESTA() {
        return $this->RESPUESTA;
    }

    public function setRESPUESTA($RESPUESTA) {
        $this->RESPUESTA = $RESPUESTA;
    }

    /*FUNCIONES PARA LLAMDAS*/
    public function SETDATA($id,$anexo,$fecha,$movil,$consulta,$respuesta,$name,$email){
        $this->ID=$id;
        $this->ANEXO=$anexo;
        $this->FECHA=$fecha;
        $this->MOVIL=$movil;
        $this->CONSULTA=$consulta;
        $this->RESPUESTA=$respuesta;
        $this->NAME=$name;
        $this->EMAIL=$email;
    }
    public function GRABAR(){
          try {
                $this->CONECTAR();
                mysql_query("Call Sp_llamada('".$this->ID."','".$this->ANEXO."','".$this->FECHA."','".$this->MOVIL."','".$this->CONSULTA."','".$this->RESPUESTA."','".$this->NAME."','".$this->EMAIL."')")
                or die(mysql_error());
                $this->Cerrar();
          }catch (Exception $exc)
                {
                echo "Ups!, lo sentimos ocurrio el siguiente error: ".$exc;
                }
    }
}
?>
