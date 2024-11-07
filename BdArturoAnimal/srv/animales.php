<?php
require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ANIMAL.php";

ejecutaServicio(function () {
    $lista = select(pdo: Bd::pdo(), from: ANIMAL, orderBy: PAS_NOMBRE);
    
    // Inicia la lista de descripción con clases de Bootstrap
    $render = "<dl class='row'>";
    
    foreach ($lista as $modelo) {
        $encodeId = urlencode($modelo[PAS_ID]);
        $id = htmlentities($encodeId);
        $nombre = htmlentities($modelo[PAS_NOMBRE]);
        $especie = htmlentities($modelo[PAS_ESPECIE]);
        $alimento = htmlentities($modelo[PAS_ALIMENTO]);
        
        $render .= "
            <div class='col-12'>
                <dl class='row'>
                    <dt class='col-sm-3'>Nombre:</dt>
                    <dd class='col-sm-9'>$nombre</dd>
                    
                    <dt class='col-sm-3'>Especie:</dt>
                    <dd class='col-sm-9'>$especie</dd>
                    
                    <dt class='col-sm-3'>Alimento:</dt>
                    <dd class='col-sm-9'>$alimento</dd>
                    
                    <dt class='col-sm-3'>Acciones:</dt>
                    <dd class='col-sm-9'>
                        <a href='modifica.html?id=$id' class='btn btn-sm btn-primary'>Modificar</a>
                    </dd>
                </dl>
            </div>
            <hr class='col-12 my-2'>";
    }
    
    $render .= "</dl>";
    
    devuelveJson(["tabla" => ["innerHTML" => $render]]);
});