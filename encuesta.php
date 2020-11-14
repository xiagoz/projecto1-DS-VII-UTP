<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encuesta-VJ</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <section class="index_header_section"></section>
      <nav class="index_header_nav">
      <section class="index_header_nav_section1">
        <a href="index.html">Projecto#1 - UTP</a>
      </section>
    </nav>
  </header>
  <section class="section_main">
  <?php
  if(array_key_exists('enviar', $_POST)) {
    require_once("class/preguntas.php");

    print ("<h1>Encuesta Registrada</h1>\n");
    $sexo = $_REQUEST['sexo'];
    $edad = $_REQUEST['edad'];
    $salario = $_REQUEST['salario'];
    $provincia = $_REQUEST['provincia'];

      $obj_encuesta = new preguntas();
      $result_ingreso = $obj_encuesta->ingresar_encuesta($sexo,$edad,$salario,$provincia);

      // foreach ($result_encuesta as $resultado) {
      //   $respuesta1 = $resultado['resp_1'];
      //   $respuesta2 = $resultado['resp_2'];
      //   $respuesta3 = $resultado['resp_3'];

      //     $i = 0;
      //     $respuesta = $_REQUEST["$i"];
      //     if($respuesta == "r1")
      //     $respuesta1 = $respuesta1 + 1;
      //     elseif ($respuesta == "r2")
      //     $respuesta2 = $respuesta2 + 1;
      //     elseif ($respuesta == "r3")
      //     $respuesta3 = $respuesta3 + 1;

      //     $obj_encuesta = new preguntas();
      //     $result = $obj_encuesta->actualizar_reportes($respuesta1, $respuesta2, $respuesta3);
      //     $i++;
      //   }


      if(!$result_ingreso) {
        print ("<p>Su encuesta ha sido registrada. Gracias por participar</p>\n");
        print ("<a HREF='reportes.php' style=text-decoration:none>Ver Reporte de resultados</a><br/>\n");
        print ("<a HREF='mantenimiento.php' style=text-decoration:none>Ir a Mantenimiento</a>\n");
      }

    echo("<footer style='position: fixed'>");
    echo("<div class='index_footer_div'>");
    echo("<div class='index_header_nav_div1'>");
    echo("<p>Desarrollo de Software VII</p>");
    echo("</div>");
    echo("</div>");
    echo("</footer>");

    }else {
    require_once("class/preguntas.php");
    $obj_encuesta = new preguntas();
    $preguntas = $obj_encuesta->consultar_preguntas();
    $cont = 1;
    ?>
  
  <h1>Encuesta de Videojuegos</h1>
  <form action="encuesta.php" method="POST">
    <?php for($i=0;$i<8;$i++) {
      $n = rand(0,15);
    echo "<b>$cont.</b>  "."<label>". $preguntas[$n]['description'] ."</label><br><br>";
    echo "<input type='radio' name='$i' value='r1' checked>" .$preguntas[$n]["resp_1"]."<br>";
    echo "<input type='radio' name='$i' value='r2'>" .$preguntas[$n]["resp_2"]."<br>";
    echo "<input type='radio' name='$i' value='r3'>" .$preguntas[$n]["resp_3"]."<br><br>";
    $cont++;
  } ?>
  <?php
  $n = rand(16,17);
  echo "<b>$cont.</b>  "."<label>". $preguntas[$n]['description'] ."</label><br><br>";
  echo "<input type='checkbox' name='8' value='r1' checked>" .$preguntas[$n]["resp_1"]."<br>";
  echo "<input type='checkbox' name='8' value='r2'>" .$preguntas[$n]["resp_2"]."<br>";
  echo "<input type='checkbox' name='8' value='r3'>" .$preguntas[$n]["resp_3"]."<br><br>";
  ?>
  <?php
  $n = rand(18,19);
  $cont++;
  echo "<b>$cont.</b>  "."<label>". $preguntas[$n]['description'] ."</label><br><br>";
  echo "<input type='radio' name='9' value='r1' checked>" .$preguntas[$n]["resp_1"]."<br>";
  echo "<input type='radio' name='9' value='r2'>" .$preguntas[$n]["resp_2"]."<br><br>";
  ?>
  <hr>
  <h3>Los siguientes datos son obligatorios llenar para registrar la encuesta.</h3>
  <label>Escoja su sexo: </label>
  <select name="sexo" required>
    <option value="">Elige una opción</option>
  <option value="Hombre" >Hombre</option>
  <option value="Mujer">Mujer</option>  
  </select><br>
  <label>Escoja su rango de edad: </label>
  <select name="edad" required>
    <option value="">Elige una opción</option>
  <option value="De 10 a 20 Años" >De 10 a 20 Años</option>  
  <option value="De 20 a 30 Años">De 20 a 30 Años</option>  
  <option value="De 30 años o más">De 30 años o más</option>  
  </select><br>
  <label>Escoja su rango de salario: </label>
  <select name="salario" required>
    <option value="">Elige una opción</option>
  <option value="De Salario Mínimo a $900" >De Salario Mínimo a $900</option>
  <option value="De $900 a $1500">De $900 a $1500</option>  
  <option value="De $1500 a más">De $1500 a más</option>  
  </select><br>
  <label>Escoja su provincia: </label>
  <select name="provincia" required>
    <option value="">Elige una opción</option>
  <option value="Bocas del Toro">Bocas del Toro</option>
  <option value="Coclé">Coclé</option>  
  <option value="Colón">Colón</option>
  <option value="Chiriquí">Chiriquí</option>  
  <option value="Darién">Darién</option>
  <option value="Herrera">Herrera</option>  
  <option value="Los Santos">Los Santos</option>
  <option value="Panamá">Panamá</option>  
  <option value="Veraguas">Veraguas</option>
  <option value="Panamá Oeste">Panamá Oeste</option>  
  </select><br><br>
   <input type="submit" name="enviar" value="Enviar" style="margin-bottom:20px">
  </form>
  </section>
    <footer>
    <div class="index_footer_div">
      <div class="index_header_nav_div1">
        <p>Desarrollo de Software VII</p>
      </div>
    </div>
  </footer>
  <?php
  }
  ?>
</body>
</html>