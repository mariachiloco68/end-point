<?php

  header('Content-Type: application/json');

  //ini_set("display_errors", 1);
  //error_reporting(E_ALL);

  require_once '/opt/lampp/htdocs/cats/class/connection.php';

  $connection = new connection;

  $query = "select * from cats";

  $json = $connection-> getData($query);
  echo json_encode($json);

  return json_encode($json);


?>
