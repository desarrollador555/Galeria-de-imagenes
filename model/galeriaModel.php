<?php
    class galeriaModel{
        public $PDO;
        protected $id_imagen;
        protected $titulo_imagen;
        protected $archivo_imagen;
        protected $descripcion_imagen;

        public function setId_imagen($id_imagen){
            $this->id_imagen=$id_imagen;
        }
        public function getId_imagen(){
            return $this->id_imagen;
        }
        public function setTitulo_imagen($titulo_imagen){
            $this->titulo_imagen=$titulo_imagen;
        }
        public function getTitulo_imagen(){
            return $this->titulo_imagen;
        }
        public function setArchivo_imagen($archivo_imagen){
            $this->archivo_imagen=$archivo_imagen;
        }
        public function getArchivo_imagen(){
            return $this->archivo_imagen;
        }
        public function setDescripcion_imagen($descripcion_imagen){
            $this->descripcion_imagen=$descripcion_imagen;
        }
        public function getDescripcion_imagen(){
            return $this->descripcion_imagen;
        }
        public function __construct()
        {
            require_once RUTA_ARCHIVOS."conect/cone.php";
            $con=new conexion();
            $this->PDO=$con->establecerConexion();
        }
        public function getPaginacion($inicio,$fin){
            if($inicio=="" && $fin==""){
                $statement=$this->PDO->prepare("SELECT * FROM publicaciones");
            }else{
                $statement=$this->PDO->prepare("SELECT * FROM publicaciones limit $inicio,$fin");
            }
            if($statement->execute()){
                $statement=$statement->fetchAll();
                return $statement;
            }else{
                return false;
            }
        }
        public function getAll(){
            $statement=$this->PDO->prepare("SELECT * FROM publicaciones");
            if($statement->execute()){
                $statement=$statement->fetchAll();
                return $statement;
            }else{
                return false;
            }
        }
        public function view($id){
            $statement=$this->PDO->prepare("SELECT * FROM publicaciones WHERE id_imagen=:id LIMIT 1");
            $statement->bindParam(":id",$id);
            if($statement->execute()){
                $statement=$statement->fetch();
                return $statement;
            }else{
                return false;
            }
        }
        public function create(galeriaModel $g){
            $statement=$this->PDO->prepare("INSERT INTO publicaciones(id_imagen,titulo_imagen,archivo_imagen,descripcion_imagen) VALUES(null,:num,:da,:tso)");
            
            $titulo=$g->getTitulo_imagen();
            $archivo_imagen=$g->getArchivo_imagen();
            $descripcion_imagen=$g->getDescripcion_imagen();

            $statement->bindParam(":num",$titulo);
            $statement->bindParam(":da",$archivo_imagen);
            $statement->bindParam(":tso",$descripcion_imagen);
            if($statement->execute()){
                
                $statement2=$this->PDO->prepare("SELECT id_imagen FROM publicaciones ORDER BY id_imagen DESC LIMIT 1");
                $statement2->execute();
                $id=$statement2->fetch()['id_imagen'];
                return $id;
            
            }else{
                return false;
            }
        }
        public function update(galeriaModel $g){
            $statement=$this->PDO->prepare("UPDATE publicaciones set titulo_imagen=:num, archivo_imagen=:da, descripcion_imagen=:tso WHERE id_imagen =:id_p");
            
            $titulo=$g->getTitulo_imagen();
            $archivo_imagen=$g->getArchivo_imagen();
            $descripcion_imagen=$g->getDescripcion_imagen();
            $id_pu=$g->getId_imagen();

            $statement->bindParam(":num",$titulo);
            $statement->bindParam(":da",$archivo_imagen);
            $statement->bindParam(":tso",$descripcion_imagen);
            $statement->bindParam(":id_p",$id_pu);
            
            if($statement->execute()){
                return $id_pu;
            }else{
                return false;
            }
        }
        public function delete(galeriaModel $d){
            $id=$d->getId_imagen();
            $statement=$this->PDO->prepare('DELETE FROM publicaciones WHERE id_imagen = :id');
            $statement->bindParam(':id',$id);
            if($statement->execute()){
                return true;
            }else{
                return false;
            }
        }
    }

?>