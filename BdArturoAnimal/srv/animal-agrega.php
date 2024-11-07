<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaAlimento.php";
require_once __DIR__ . "/../lib/php/validaEspecie.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ANIMAL.php";

ejecutaServicio(function () {

 $nombre = recuperaTexto("nombre");
 $especie = recuperaTexto("especie");
 $alimento = recuperaTexto("alimento");
 $nombre = validaNombre($nombre);
 $especie = validaEspecie( $especie);
 $alimento = validaAlimento($alimento);


 $pdo = Bd::pdo();
 insert(pdo: $pdo, into: ANIMAL, values: [PAS_NOMBRE => $nombre, PAS_ESPECIE => $especie, PAS_ALIMENTO => $alimento]);
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/pasatiempo.php?id=$encodeId", [
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "especie" => ["value" => $especie],
  "alimento" => ["value" => $alimento],
 ]);
});
