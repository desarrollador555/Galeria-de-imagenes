<?php
    session_start();
    require_once "asset/constantes.php";
    require_once RUTA_ARCHIVOS."view/HeaderFooter/header.php";
    require_once RUTA_ARCHIVOS."core/route.php";
    $core=new route();
    if(!empty($_GET['c'])){
        $controller=filter_var($_GET["c"],FILTER_SANITIZE_STRING);
        $c=$core->cargarController($controller);
        if(!empty($_GET["a"])){
            $a=filter_var($_GET['a'],FILTER_SANITIZE_STRING);
            $core->cargarAccion($c,$a);
        }else{
            $core->cargarAccion($c,ACTION);
        }
    }else{
        $c=$core->cargarController(CONTROLLER);
        $core->cargarAccion($c,ACTION);
    }
    require_once RUTA_ARCHIVOS."view/HeaderFooter/footer.php";
?>