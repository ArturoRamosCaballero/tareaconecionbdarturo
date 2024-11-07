<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaAlimento(false|string $alimento)
{
    if ($alimento === false) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Falta el Alimento.",
            type: "/error/faltaalimento.html",
            detail: "La solicitud no tiene el valor de Alimento."
        );
    }

    $trimAlimento = trim($alimento);

    if ($trimAlimento === "") {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Alimento en blanco.",
            type: "/error/alimentoenblanco.html",
            detail: "Pon texto en el campo Alimento."
        );
    }

    // Validación de longitud mínima
    if (strlen($trimAlimento) <= 2) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Alimento demasiado corto.",
            type: "/error/alimentocorto.html",
            detail: "El Alimento debe tener minimo 3 caracteres."
        );
    }

    return $trimAlimento;
}
