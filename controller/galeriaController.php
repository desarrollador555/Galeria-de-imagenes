<?php
    class galeriaController{
        public $model;
        public $paginacion;
        public function __construct()
        {
            require_once RUTA_ARCHIVOS."asset/function/funciones.php";
            require_once RUTA_ARCHIVOS."model/galeriaModel.php";
            require_once RUTA_ARCHIVOS."asset/function/paginacion.php";
            $this->paginacion=new paginacion();
            $this->model=new galeriaModel();
        }
        public function actionIndex(){
            
            $numeroRegistros=$this->paginacion->totalRegistros("publicaciones");
            $totalPaginas=$this->paginacion->numerodepaginas($numeroRegistros);
            $paginaActual=$this->paginacion->obtenerPagina();
            $postPagina=9;
            $inicio=$paginaActual>1?($paginaActual*$postPagina)-$postPagina:0;
            $publicaciones=$this->model->getPaginacion($inicio,$postPagina);
            
            //Necesario para la paginacion
                $controller="galeria";
                $action="index";
            //Necesario para la paginacion

            require_once RUTA_ARCHIVOS."view/galeria/galeria.php";
        }
        public function actionManager(){
            $datos=$this->model->getAll();
            require_once RUTA_ARCHIVOS."view/galeria/manager.php";
        }
        public function actionUpdate(){
            $dato=$this->model->view(intval($_GET['id']));
            if($dato){
                require_once RUTA_ARCHIVOS."view/galeria/update.php";
            }else{
                redireccionar("galeria","index");
            }
        }
        public function actionView(){
            $dato=$this->model->view(intval($_GET['id']));
            if($dato){
                require_once "view/galeria/view.php";
            }else{
                redireccionar("galeria","index");
            }
        }
        public function actionCreate(){
            require_once "view/galeria/create.php";
        }
        public function actionPrepararDatos(){
            $a=limpiarCampos($_GET['s']);
            
            $publicacion=new galeriaModel();

            $publicacion->setTitulo_imagen(limpiarCampos($_POST['titulo']));
            $publicacion->setDescripcion_imagen(limpiarCampos($_POST['descripcion']));

            switch($a){
                case "create":
                    $archivo=$_FILES['archivo'];
                    $nombreImagen=(rand(1,1000000)*2300).$archivo['name'];
                    $tmp_dir=$archivo['tmp_name']; 
                    $almacenarDB="imagenes/".$nombreImagen;
                        if($tmp_dir){
                            $publicacion->setArchivo_imagen($almacenarDB);
                        }else{

                        }
                    $id_imagen=$this->model->create($publicacion);
                    if(!empty($id_imagen)){
                        $subirA=RUTA_ARCHIVOS."imagenes/".$nombreImagen;
                        move_uploaded_file($tmp_dir,$subirA);
                        redireccionarId("galeria","view",$id_imagen);
                    }else{
                        redireccionar("galeria","create");
                    }
                    break;
                case "update":
                    $publicacion->setId_imagen(limpiarCampos($_POST['id']));
                    $archivo=$_FILES['archivo'];
                    $nombreImagen=(rand(1,1000000)*2300).$archivo['name'];
                    if($archivo['tmp_name']){
                        $tmp_dir=$archivo['tmp_name']; 

                        $almacenarDB="imagenes/".$nombreImagen;

                        $imagenBorrar=$this->model->view(limpiarCampos($_POST['id']));//obtener la imagen anterior
                        unlink(RUTA_ARCHIVOS.$imagenBorrar['archivo_imagen']);
                        $publicacion->setArchivo_imagen($almacenarDB);

                    }else{
                        $publicacion->setArchivo_imagen(limpiarCampos($_POST['archivoDb']));
                    }
                    $id=$this->model->update($publicacion);
                        if($id){
                            if($archivo['tmp_name']){
                                move_uploaded_file($tmp_dir,RUTA_ARCHIVOS.$almacenarDB);
                            }
                            redireccionarId("galeria","view",$id);
                        }else{
                            redireccionarId("galeria","update",$id);
                        }
                    break;
            }
        }
        public function actionDelete(){
            $user=new galeriaModel();
            $user->setId_imagen(limpiarCampos($_GET['id']));
            $id=$this->model->view(limpiarCampos($_GET['id']));
            $check=$this->model->delete($user);
                if($check==true){
                    unlink(RUTA_ARCHIVOS.$id['archivo_imagen']);
                    redireccionar('galeria','manager');
                }else{
                    redireccionar('galeria','index');
                }
        }
    }

?>