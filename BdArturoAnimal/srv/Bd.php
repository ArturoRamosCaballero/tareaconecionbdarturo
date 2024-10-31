<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:srvbd.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

  // self::$pdo->exec("DROP TABLE IF EXISTS PASATIEMPO");
  // self::$pdo->exec("DROP TABLE IF EXISTS VEHICULO");
  // self::$pdo->exec("DROP TABLE IF EXISTS ANIMAL");
  

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS ANIMAL (
      PAS_ID INTEGER,
      PAS_NOMBRE TEXT NOT NULL,
      PAS_TIPO TEXT NOT NULL,
      PAS_HABITAT TEXT NOT NULL,

      CONSTRAINT PAS_PK
       PRIMARY KEY(PAS_ID),

      CONSTRAINT PAS_NOM_UNQ
       UNIQUE(PAS_NOMBRE),

      CONSTRAINT PAS_NOM_NV
       CHECK(LENGTH(PAS_NOMBRE) > 0),
       
      CONSTRAINT PAS_TIPO_NV
       CHECK(LENGTH(PAS_TIPO) > 0),
       
      CONSTRAINT PAS_HAB_NV
       CHECK(LENGTH(PAS_HABITAT) > 0)
     )"
   );
  }

  return self::$pdo;
 }
}
