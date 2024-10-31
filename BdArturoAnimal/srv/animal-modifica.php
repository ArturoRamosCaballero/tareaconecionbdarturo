<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaHabitat.php";
require_once __DIR__ . "/../lib/php/validaTipo.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ANIMAL.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");
 $nombre = recuperaTexto("nombre");
 $tipo = recuperaTexto("tipo");
 $habitat = recuperaTexto("habitat");
 $nombre = validaNombre($nombre);
 $tipo = validaTipo($tipo);
 $habitat = validaHabitat($habitat);

 

 update(
  pdo: Bd::pdo(),
  table: ANIMAL,
  set: [PAS_NOMBRE => $nombre, PAS_TIPO => $tipo, PAS_HABITAT => $habitat],
  where: [PAS_ID => $id]
 );

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "tipo" => ["value" => $tipo],
  "habitat" => ["value" => $habitat],
 ]);
});
