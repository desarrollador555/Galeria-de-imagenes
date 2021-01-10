<?php 
    class siteModel{
        public $PDO;
        public $nombreUsuario;
        public $contraseñaUsuario;
        public $repetirContraseñaUsuario;

        public function setNombreUsuario(string $nombreUsuario){
            $this->nombreUsuario=$nombreUsuario;
        }
        public function getNombreUsuario(){
            // echo $this->nombreUsuario;
            return $this->nombreUsuario;
        }
        public function setContraseñaUsuario(string $contraseñaUsuario){
            $this->contraseñaUsuario=$contraseñaUsuario;
        }
        public function getContraseñaUsuario(){
            // echo $this->contraseñaUsuario;
            return $this->contraseñaUsuario;
        }
        public function setRepetirContraseñaUsuario(string $repetirContraseñaUsuario){
            $this->repetirContraseñaUsuario=$repetirContraseñaUsuario;
        }
        public function getRepetirContraseñaUsuario(){
            return $this->repetirContraseñaUsuario;
        }
        public function __construct()
        {
            require_once RUTA_ARCHIVOS."conect/cone.php";
            $con=new conexion();
            $this->PDO=$con->establecerConexion();
            
        }//fin de __construct

        public function login(siteModel $p){
            $datos=$this->PDO->prepare("SELECT * from usuarios where nombreUsuario=:nom && contraseñaUsuario=:con limit 1");
            
            $nombre=$p->getNombreUsuario();
            $contraseña=$p->getContraseñaUsuario();
            
            $datos->bindParam(":nom",$nombre);
            $datos->bindParam(":con",$contraseña);
            if($datos->execute()){
                $datos=$datos->fetch();
                return $datos;
            }else{
                return false;
            }
        }//Fin de login
        public function signup(siteModel $p){
            $statement=$this->PDO->prepare("INSERT INTO usuarios(nombreUsuario,contraseñaUsuario,repetirContraseñaUsuario) VALUES(:nom,:pas,:pass)");
            $nombre=$p->getNombreUsuario();$password=$p->getContraseñaUsuario();$password2=$p->getRepetirContraseñaUsuario();
            $statement->bindParam(":nom",$nombre);
            $statement->bindParam(":pas",$password);
            $statement->bindParam(":pass",$password2);
            if($statement->execute()){
                return true;
            }else{
                return false;
            }
        }
    }
?>