<?php

  header('Content-Type: application/json');

  require_once '/opt/lampp/htdocs/cats/class/connection.php';

  $connection = new connection;

  $codigo = explode('?id=',$_SERVER['REQUEST_URI']);

  $query = "select * from cats where ID = '" . $codigo[1] . "'";

  $json = $connection-> getData($query);

  echo json_encode($json);

  return json_encode($json);
  
 ?>
