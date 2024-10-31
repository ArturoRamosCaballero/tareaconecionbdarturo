<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaHabitat(false|string $habitat)
{
    if ($habitat === false) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Falta el habitat.",
            type: "/error/faltahabitat.html",
            detail: "La solicitud no tiene el valor de habitat."
        );
    }

    $trimHabitat = trim($habitat);

    if ($trimHabitat === "") {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Habitat en blanco.",
            type: "/error/habitatenblanco.html",
            detail: "Pon texto en el campo habitat."
        );
    }

    // Validación de longitud mínima
    if (strlen($trimHabitat) <= 2) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Habitat demasiado corto.",
            type: "/error/habitatcorto.html",
            detail: "El habitat debe tener minimo 3 caracteres."
        );
    }

    return $trimHabitat;
}
