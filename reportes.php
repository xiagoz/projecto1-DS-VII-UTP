<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reportes-VJ</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Resultados de la Encuesta</h1>
    <?php
    if(array_key_exists('enviar', $_POST)) {
      require_once("class/realizadas.php");

      $filtro = $_REQUEST['campos'];

      $obj_encuestas = new realizadas();
      $result_encuestas = $obj_encuestas->listar_encuestados();

      $totalEncuestas = count($result_encuestas);
      if($result_encuestas[0]['sexo'] == "Hombre"){
        $hombres =
      }

      foreach ($result_encuestas as $result) {
        $sexo = $result['sexo'];
        $edad = $result['edad'];
        $salario = $result['salario'];
        $provincia = $result['provincia'];
      }

      print ("<table>\n");
      print ("<tr>\n");
      print ("<th>Respuesta</th>\n");
      print ("<th>Encuesta</th>\n");
      print ("<th>Porcentaje</th>\n");
      print ("<th>Representation grafica</th>\n");
      print ("</tr>\n");

      switch($filtro) {
        case "sexo":
          $obj_encuestas = new realizadas();
          $hombres = $obj_encuestas->contar_sexo("Hombre");
          $porcentaje = round (($hombres/$totalEncuestas)*100,2);
          print ("<tr>\n");
          print ("<td class='izquierda'>Hombres</td>\n");
          print ("<td class='derecha'>$hombres</td>\n");
          print ("<td class='derecha'>porcentaje%</td>\n");
          print ("<td class='izquierda' width='400'><img src='img/puntoamarillo.gif' height='10' width='" .$porcentaje*4 . "'></td>\n");
          print ("</tr>\n");

          // $obj_encuestas = new realizadas();
          // $mujeres = $obj_encuestas->contar_sexo("Mujer");
          // $porcentaje = round (($mujeres/$totalEncuestas)*100,2);
          // print ("<tr>\n");
          // print ("<td class='izquierda'>mujeres</td>\n");
          // print ("<td class='derecha'>$mujeres</td>\n");
          // print ("<td class='derecha'>porcentaje%</td>\n");
          // print ("<td class='izquierda' width='400'><img src='img/puntoamarillo.gif' height='10' width='" .$porcentaje*4 . "'></td>\n");
          // print ("</tr>\n");
          break;

      }




      // $porcentaje = round (($m/$totalEncuestas)*100,2);
      // print ("<tr>\n");
      // print ("<td class='izquierda'>Mujeres</td>\n");
      // print ("<td class='derecha'>$m</td>\n");
      // print ("<td class='derecha'>$porcentaje%</td>\n");
      // print ("<td class='izquierda' width='400'><img src='img/puntoamarillo.gif' height='10' width='" .$porcentaje*4 . "'></td>\n");
      // print ("</tr>\n");

      print ("</table>\n");
      print ("<p>Numero total de encuestas emitidos: $totalEncuestas </p>\n");
      print ("<p><A HREF='encuesta.php' style=text-decoration:none>Realizar una nueva Encuesta</a></p>\n");
      print ("<a HREF='mantenimiento.php' style=text-decoration:none>Ir a Mantenimiento</a>\n");
    } else {
  ?>
  <form action="reportes.php" method="post">
    <label>Escoja una opción para filtrar el reporte</label><br>
    <select name="campos" required>
      <option value="">Elige una opción</option>
      <option value="sexo" >Sexo</option>
      <option value="edad">Rango de Edad</option>
      <option value="salario">Rango de Salario</option>
      <option value="provincia">Provincia</option>
    </select><br><br>
    <input type="submit" value="Mostrar" name="enviar" >
  </form>
   <?php
  }
  ?>
</body>
</html>