<?php
class BaseMysql
{
  static public function conexion()
  {
    try {
      $dsn = "mysql:host=127.0.0.1;dbname=movies_db;port=3306;charset=utf8mb4";
      $usuario = "root";
      $password = "1002025918";
      $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
      $bd = new PDO($dsn, $usuario, $password, $opt);

      return $bd;
    } catch (PDOException $error) {
      echo "<h2>No me pude conectar con la Base de Datos...<br></h2>" . $error->getMessage();
      exit;
    }
  }
}
