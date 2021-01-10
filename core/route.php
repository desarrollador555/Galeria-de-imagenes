<?php
    require_once RUTA_ARCHIVOS."/asset/constantes.php";
    class route{
        public function cargarController($controller){
            $nameController=$controller."controller";
            $dirCrontroller=RUTA_ARCHIVOS."Controller/".$nameController.".php";
            if(is_file($dirCrontroller)){
                require_once $dirCrontroller;
                $controllerL=new $nameController();
                return $controllerL;
            }else{

            }
        }
        public function cargarAccion($controller,$action){
            $action="action".$action;
            if(method_exists($controller,$action)){
                $controller->$action();
            }
        }
    }

?>