<?php
    class conexion{
        public function establecerConexion(){
            try{
                $con=new PDO("mysql:host=localhost;dbname=galeria","root","");
                // echo "conectado";
                return $con;
            }catch(PDOException $E){
                return false;
            }
        }
    }
    // $con=new conexion();
    // $PDO=$con->establecerConexion();
    
    // $statement=$PDO->prepare("INSERT into usuarios values(null,:n21,:n22,:n23)");
    // $nom="asdasd";
    // $pass="asdasd";
    // $passs="asdasd";
    
    // $statement->execute(array(
    //     ":n21"=>$nom,
    //     ":n22"=>$pass,
    //     ":n23"=>$passs
    // ));
        
    
    
?>