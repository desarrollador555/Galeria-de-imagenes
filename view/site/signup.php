<?php 
    if(!empty($_SESSION['usuario'])){
        redireccionar('galeria','index');
    }
?>
<div class="contenedor fondo">
    <main>
    <form class="formulario" id="formulario" method="POST" autocomplete="off" action="index.php?c=site&a=ProcesarDatos&s=singup">
        <h2 class="tituloForm">Registrate</h2>
        <!-- Grupo usuario -->
        <div class="formulario__grupo" id="grupo__usuario">
            <label class="formulario__label" for="nombre">Usuario</label>
            <div class="formulario__grupo__input">
                <input type="text" class="formulario__input" name="nombre" id="nombre">
                <i class="formulario__validacion-estado far fa-user"></i>
            </div>
                <p class="formulario__input-error">El usuario solo acepta numeros y letras, con un maximo de 4 a 14 digitos</p>
        </div>
        <!-- Grupo password -->
        <div class="formulario__grupo" id="grupo__password">
            <label class="formulario__label" for="password">Contraseña</label>
            <div class="formulario__grupo__input">
                <input id="password" class="formulario__input" type="password" name="password">
                <i class="formulario__validacion-estado fas fa-lock"></i>
            </div>
            <div class="show-message">
                <a onclick="show()" id="show" class="show-message" value="Ver Contraseña">Ver contraseña</a>
            </div>

                <p  class="formulario__input-error">La password debe ser segura</p>
        </div>
        <!-- Grupo password2 -->
        <div class="formulario__grupo" id="grupo__password2">
            <label class="formulario__label" for="password2">Repetir Contraseña</label>
            <div class="formulario__grupo__input">
                <input id="password2" class="formulario__input" type="password" name="password2">
                <i class="formulario__validacion-estado fas fa-lock"></i>
            </div>

                <p  class="formulario__input-error">Las contraseñas deben ser iguales</p>
        </div>

        <div class="formulario__mensaje" id="formulario__mensaje">
            <p><i class="fas fa-exclamation-triangle"></i><b> Error </b>Favor de completar los campos correctamente</p>
        </div>
        <div class="formulario__grupo formulario__grupo_btn-enviar">
            <input type="submit" id="enviar" class="btn btn-success" value="Iniciar Sesion">
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
        </div>

        <div class="formulario__grupo">
            <p>No tienes una cuenta <a href="<?= RUTA_WEB?>index.php?c=site&a=Signup">Clic Aqui</a></p>
            <a href="">Clic para obtener Una cuenta</a>
        </div>
        
</form>
    </main>
    
</div>