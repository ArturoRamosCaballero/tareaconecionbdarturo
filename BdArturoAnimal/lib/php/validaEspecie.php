<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaEspecie(false|string $especie)
{
    if ($especie === false) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Falta el especie.",
            type: "/error/faltaespecie.html",
            detail: "La solicitud no tiene el valor de especie."
        );
    }

    $trimEspecie = trim($especie);

    if ($trimEspecie === "") {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "especie en blanco.",
            type: "/error/especieenblanco.html",
            detail: "Pon texto en el campo especie."
        );
    }

    // Validación de longitud mínima
    if (strlen($trimEspecie) <= 2) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "especie demasiado corto.",
            type: "/error/especiecorto.html",
            detail: "El especie debe tener minimo 3 caracteres."
        );
    }

    return $trimEspecie;
}
