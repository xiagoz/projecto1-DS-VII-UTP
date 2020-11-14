<?php

require_once('modelo.php');

class realizadas extends modeloCredencialesBD{

  public function __construct()
  {
    parent::__construct();
  }

    public function listar_encuestados() {

    $instruccion = "CALL listar_encuestados()";

    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

      public function contar_sexo($valor) {

    $instruccion = "SELECT COUNT(*) FROM users WHERE sexo= $valor";

    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
    
    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }
}