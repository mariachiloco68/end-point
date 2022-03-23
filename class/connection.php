<?php

  class connection {

      private $server;
      private $user;
      private $password;
      private $database;
      private $connection;

      function __construct(){

          $listadatos = $this->dataConnection();
          //var_dump($listadatos);
          //read values from the config file
          foreach ($listadatos as $key => $value) {
              $this->server = $value['server'];
              $this->user = $value['user'];
              $this->password = $value['password'];
              $this->database = $value['database'];
          }
          $this->connection = new mysqli($this->server,$this->user,$this->password,$this->database);
          if($this->connection->connect_errno){
              echo "Something went wrong with the connection";
              die();
          }

      }

      private function dataConnection() {
          $direction = dirname(__FILE__);
          // read config file and return json
          $json = file_get_contents($direction . '/' . 'config');
          return json_decode($json, true);
      }

      private function convertUFT8($array){
        array_walk_recursive($array, function(&$item, $key){
          if (!mb_detect_encoding($item,'utf-8',true)) {
              $item = uft8_encode($item);
          }
        });
        return $array;
      }

      public function getData($sqlstr){
          $result = $this-> connection-> query($sqlstr);
          $resultArray = array();
          foreach ($result as $key) {
              $resultArray[] = $key;
          }
          return $this->convertUFT8($resultArray);
      }
  }















?>
