<?php

require_once('modelo.php');

class preguntas extends modeloCredencialesBD{

  public function __construct()
  {
    parent::__construct();
  }

  public function consultar_preguntas(){
     $instruccion = "CALL listar_preguntas()";

    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

    public function ingresar_encuesta($sexo,$edad,$salario,$provincia) {

    // $instruccion = "INSERT INTO users (sexo,edad,salario,provincia) VALUES ('$sexo','$edad','$salario','$provincia')";
    $instruccion = "CALL ingresar_usuarios('".$sexo."','".$edad."','".$salario."','".$provincia."')";
    $consulta=$this->_db->query($instruccion);
    
    if($consulta !== true){
      $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
      if($resultado){
        return $resultado;
        $resultado->close();
        $this->_db->close();
      }
    }
  }

    public function actualizar_reportes($respuesta1,$respuesta2,$respuesta3) {
    $instruccion = "CALL actualizar_respuestas('".$respuesta1."','".$respuesta2."','".$respuesta3."')";
    $actualiza=$this->_db->query($instruccion);

    if($actualiza) {
      return $actualiza;
      $actualiza->close();
      $this->_db->close();
    }
  }
}