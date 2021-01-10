<?php
    class siteController{
        public $model;
        // public $user;
        public function __construct()
        {
            require_once RUTA_ARCHIVOS."model/siteModel.php";
            require_once RUTA_ARCHIVOS."asset/function/funciones.php";
            $this->model=new siteModel();
        }
        public function actionLogin(){
            require_once RUTA_ARCHIVOS."view/site/login.php";
        }
        public function actionClosedSession(){
            session_destroy();
            redireccionar("galeria","index");
        }
        public function actionInfo(){
            require_once RUTA_ARCHIVOS."view/site/info.php";
        }
        public function actionProcesarDatos(){
            if(!empty($_GET["s"])){
                $dato=$_GET["s"];

                $user=new siteModel();
                $user->setNombreUsuario(limpiarCampos($_POST['nombre']));
                $user->setContraseñaUsuario(hash("sha512",limpiarCampos($_POST['password'])));
                switch($dato){
                    case "login":
                        $datos=$this->model->login($user);
                        if(!empty($datos)){
                            $_SESSION['id']=$datos[0];
                            $_SESSION['usuario']=$datos[1];
                            $_SESSION['contraseña']=$datos[2];
                            redireccionar("galeria","index");
                        }else{
                            redireccionar("site","login");
                        }
                        break;
                    case "singup":
                        $user->setRepetirContraseñaUsuario(hash("sha512",limpiarCampos($_POST['password2'])));
                        if($user->getContraseñaUsuario()==$user->getRepetirContraseñaUsuario()){
                            if($this->model->signup($user)){
                                    redireccionar("site","login");
                            }else{
                                    redireccionar("site","sigup");
                            }
                        }else{
                        }
                        // if($this->model->signup($user)){
                        // }else{
                        
                        // }
                        break;
                }
            }else{
                return false;
            }
        }
        public function actionSignup(){
            require_once RUTA_ARCHIVOS."view/site/Signup.php";
        }
    }

?>