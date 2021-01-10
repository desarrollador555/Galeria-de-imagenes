<?php 
    if(empty($_SESSION['usuario'])){
        redireccionar('galeria','index');
    }
?>
<div class="contenedor">
    <form autocomplete="off" action="index.php?c=galeria&a=PrepararDatos&s=update" class="formulario__galeria__create" method="POST" id="formulario__galeria__update" action="" enctype="multipart/form-data">
        <h2 class="titulo">Editar registro con Id: <?=$dato['id_imagen']?></h2>
        <input type="hidden" name="id" value="<?=$dato['id_imagen']?>">
        <div class="formulario__grupo" id="grupo__titulo">
            <label class="formulario__label" for="titulo">Titulo</label>
            <div class="formulario__grupo__input">
                <input maxlength="100" type="text" value="<?=$dato['titulo_imagen']?>" class="formulario__input" name="titulo" id="titulo">
                <i class="fas fa-text-height formulario__validacion-estado"></i>
            </div>
                <p class="formulario__input-error">El titulo solo debe tener de 4 a 20 letras</p>
        </div>
        <div class="formulario__grupo" id="grupo__archivo">
            <label style="padding: 20px 0px; " class="formulario__label" for="archivo">Clic para subir imagen</label>
            <div class="formulario__grupo__input" class="file">
                <input type="file" accept=".jpg,.jpeg" class="file formulario__input" name="archivo" id="archivo">
                
                <input type="hidden" accept=".jpg,.jpeg" class="" name="archivoDb" value="<?= $dato['archivo_imagen'] ?>">
                
                <i class="formulario__validacion-estado far fa-user"></i>
            </div>
                <p class="formulario__input-error">El archivo debe ser jpg o jpeg</p>
                <div id="cajaImagenDb">
                    <img id="imagenPreDB" src="<?=$dato['archivo_imagen']?>" alt="">
                </div>
            <div id="preview"></div>
        </div>

        <div class="formulario__grupo" id="grupo__descripcion">
            <label class="formulario__label" for="descripcion">Descripcion</label>
            <div class="formulario__grupo__input">
                <!-- <input type="text"  name="descripcion"> -->
                <textarea maxlength="300" name="descripcion" class="textarea formulario__input" id="descripcion" cols="30" rows="10"><?=$dato['descripcion_imagen']?></textarea>
                <i class="fas fa-align-justify formulario__validacion-estado"></i>
            </div>
                <p class="formulario__input-error">La descripcion debe tener de 4 a 100 digitos</p>
        </div>
        <div class="formulario__mensaje" id="formulario__mensaje">
            <p><i class="fas fa-exclamation-triangle"></i><b> Error </b>Favor de completar los campos correctamente</p>
        </div>

        <div class="formulario__grupo formulario__grupo_btn-enviar mt-4">
            <input type="submit" id="enviar" class="btn btn-success" value="Subir Imagen">
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Imagen agregada correctamente</p>
        </div>
    </form>
</div>