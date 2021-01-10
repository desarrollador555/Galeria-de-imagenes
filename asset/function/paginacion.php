<?php
    class paginacion{
        private $db;
        
        public function __construct()
        {
            require_once RUTA_ARCHIVOS."conect/cone.php";
            $con=new conexion();
            $this->db=$con->establecerConexion();
        }
        public function obtenerPagina(){
            return $paginaA=(!empty($_GET['p']))?(int)$_GET['p']:1;
        }
        
        public function totalRegistros($nombre){
            $total=$this->db->prepare("SELECT COUNT(*) as total FROM $nombre");
            $total->execute();
            $total=$total->fetch();
            return $total['total'];
        }
        public function numerodepaginas($totalRegistros){
            return ceil($totalRegistros/9);
        }
    }

?>