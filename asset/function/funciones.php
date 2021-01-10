<?php 

    function limpiarCampos(String $elemento){
        $elemento=filter_var($elemento,FILTER_SANITIZE_STRING);
        $elemento=htmlspecialchars($elemento);
        $elemento=trim($elemento);
        return $elemento;
    }
    function verificarSesion(){
        if(!$_SESSION['usuario'] || !$_SESSION['id']){
            redireccionar("site","login");
        }
    }
    function redireccionar($controller,$action){
        ?>
            <script>
                window.location="index.php?c=<?=$controller?>&a=<?=$action?>";
            </script>
        <?php
    }
    function redireccionarId($controller,$action,$id){
        ?>
            <script>
                window.location="index.php?c=<?=$controller?>&a=<?=$action?>&id=<?=$id?>";
            </script>
        <?php
    }

?>