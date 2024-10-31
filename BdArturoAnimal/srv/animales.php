<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ANIMAL.php";

ejecutaServicio(function () {

    $lista = select(pdo: Bd::pdo(), from: ANIMAL, orderBy: PAS_NOMBRE);

    // Inicia la tabla con clases de Bootstrap
    $render = "<table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Hábitat</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>";

    foreach ($lista as $modelo) {
        $encodeId = urlencode($modelo[PAS_ID]);
        $id = htmlentities($encodeId);
        $nombre = htmlentities($modelo[PAS_NOMBRE]);
        $tipo = htmlentities($modelo[PAS_TIPO]);
        $habitat = htmlentities($modelo[PAS_HABITAT]);

        $render .=
            "<tr>
                <td>$nombre</td>
                <td>$tipo</td>
                <td>$habitat</td>
                <td><a href='modifica.html?id=$id' class='btn btn-sm btn-primary'>Modificar</a></td>
            </tr>";
    }

    $render .= "</tbody></table>";  // Cierre de la tabla

    devuelveJson(["tabla" => ["innerHTML" => $render]]);
});
