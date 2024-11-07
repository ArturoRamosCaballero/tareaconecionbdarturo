<?php

require_once __DIR__ . "/../lib/php/NOT_FOUND.php";
require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/selectFirst.php";
require_once __DIR__ . "/../lib/php/ProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ANIMAL.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");

 $modelo =
  selectFirst(pdo: Bd::pdo(),  from: ANIMAL,  where: [PAS_ID => $id]);

 if ($modelo === false) {
  $idHtml = htmlentities($id);
  throw new ProblemDetails(
   status: NOT_FOUND,
   title: "Animal no encontrado.",
   type: "/error/animalnoencontrado.html",
   detail: "No se encontró ningún Animal con el id $idHtml.",
  );
 }

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $modelo[PAS_NOMBRE]],
  "especie" => ["value" => $modelo[PAS_ESPECIE]],
  "alimento" => ["value" => $modelo[PAS_ALIMENTO]],
 ]);
});
