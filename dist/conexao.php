<?php
   
   header("Content-type: text/html; charset=utf-8");

   function pdo_open()
   {
      $id_data_host = 'localhost';
      $id_data_db   = 'controle_devedores';
      $id_data_user = 'root';
      $id_data_pass = '';
      try
      {
         $lnk = 'mysql:host='.$id_data_host.';dbname='.$id_data_db;
         $pdo = new PDO("$lnk", $id_data_user, $id_data_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false, PDO::MYSQL_ATTR_LOCAL_INFILE => true));         
         return($pdo);
      }
      catch (PDOException $e)
      {
         echo 'Erro ao conectar com o MySQL: '.$e->getMessage();
         return '0';
      }
   }

   function preparaEexecutaArray($query, $params = []) {
      global $con;
      if ($con==NULL) {
         $con = pdo_open();
      }
      if (empty($params))
         $resultado = $con->query($query);
      else {
         $resultado = $con->prepare($query);
         $resultado->execute($params);
      }

      return $resultado;
   }
   function query($query, $params = NULL) {
      if (!is_array($params)) {
         $params = func_get_args();
         array_shift($params);
      }

      return preparaEexecutaArray($query, $params);
   }