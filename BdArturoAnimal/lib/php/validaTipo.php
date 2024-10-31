<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaTipo(false|string $tipo)
{
    if ($tipo === false) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Falta el tipo.",
            type: "/error/faltatipo.html",
            detail: "La solicitud no tiene el valor de tipo."
        );
    }

    $trimTipo = trim($tipo);

    if ($trimTipo === "") {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Tipo en blanco.",
            type: "/error/tipoenblanco.html",
            detail: "Pon texto en el campo tipo."
        );
    }

    // Validación de longitud mínima
    if (strlen($trimTipo) <= 2) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Tipo demasiado corto.",
            type: "/error/tipocorto.html",
            detail: "El tipo debe tener minimo 3 caracteres."
        );
    }

    return $trimTipo;
}
