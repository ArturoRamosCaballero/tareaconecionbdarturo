<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaAlimento.php";
require_once __DIR__ . "/../lib/php/validaEspecie.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ANIMAL.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");
 $nombre = recuperaTexto("nombre");
 $especie = recuperaTexto("especie");
 $alimento = recuperaTexto("alimento");
 $nombre = validaNombre($nombre);
 $especie = validaEspecie($especie);
 $alimento = validaAlimento($alimento);

 

 update(
  pdo: Bd::pdo(),
  table: ANIMAL,
  set: [PAS_NOMBRE => $nombre, PAS_ESPECIE => $especie, PAS_ALIMENTO => $alimento],
  where: [PAS_ID => $id]
 );

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "especie" => ["value" => $especie],
  "alimento" => ["value" => $alimento],
 ]);
});
