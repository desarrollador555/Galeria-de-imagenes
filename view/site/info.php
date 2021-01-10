<div class="contenedor fondo">
    <div class="cabecera">
        <h2 class="titulo">Desarrollador Web</h2>
    </div>
    <div class="grupo__general">
        <div class="skills__container">
            <div class="titulo">
                <h2>Mis Skills</h2>
            </div>
            <div class="skills">
                <div class="skill__item">
                    <!-- <img src="imagenes/img1.jpg" class="skill__img" alt=""> -->
                    <i style="font-size: 80px;" class="ele fab fa-js skill__img"></i>
                    <h2 class="skill__title">JavaScript</h2>
                </div>
                <div class="skill__item">
                    <!-- <img src="imagenes/img1.jpg" class="skill__img" alt=""> -->
                    <i style="font-size: 80px;" class="ele fab fa-html5"></i>
                    <h2 class="skill__title">HTML:5</h2>
                </div>
                <div class="skill__item">
                    <!-- <img src="imagenes/img1.jpg" class="skill__img" alt=""> -->
                    <i style="font-size: 80px;" class="ele fab fa-css3-alt"></i>
                    <h2 class="skill__title">CSS3</h2>
                </div>
                <div class="skill__item">
                    <!-- <img src="imagenes/img1.jpg" class="skill__img" alt=""> -->
                    <i style="font-size: 80px;" class="ele fab fa-php"></i>
                    <h2 class="skill__title">PHP</h2>
                </div>
                <div class="skill__item">
                    <!-- <img src="imagenes/img1.jpg" class="skill__img" alt=""> -->
                    <i style="font-size: 80px;" class="ele fas fa-database skill__img"></i>
                    <h2 class="skill__title">MySql</h2>
                </div>
                <div class="skill__item">
                    <!-- <img src="imagenes/img1.jpg" class="skill__img" alt=""> -->
                    <i style="font-size: 80px;" class="ele fas fa-laptop-code skill__img"></i>
                    <h2 class="skill__title">Visual Studio Code</h2>
                </div>
                <div class="skill__item">
                    <!-- <img src="imagenes/img1.jpg" class="skill__img" alt=""> -->
                    <i style="font-size: 80px;" class="ele fab fa-font-awesome-alt skill__img"></i>
                    <h2 class="skill__title">Font Awesome</h2>
                </div>
            </div>
        </div>
        <div class="grupoContacto">
            <form action="" class="formulario" id="formContacto" autocomplete="off">
                <h2 class="tituloForm">Contactame</h2>
                <!--Inicio de grupo contacto-->
                <div class="formulario__grupo" id="grupo__correo">
                    <label class="formulario__label" for="nombre">Correo</label>
                    <div class="formulario__grupo__input">
                        <input type="email" name="correo" class="formulario__input" id="correoElectronico" placeholder="correo@correo.com">
                        <i class="formulario__validacion-estado fas fa-envelope"></i>
                    </div>
                        <p class="formulario__input-error">Correo Electronico invalido</p>
                </div>
                <!--Fin de grupo contacto-->
                <!--Inicio de grupo contacto-->
                <div class="formulario__grupo" id="grupo__mensaje">
                    <label class="formulario__label" for="mensaje">Mensaje</label>
                    <div class="formulario__grupo__input">
                        <textarea name="mensaje" id="Mensaje" class="formulario__input textarea" cols="30" rows="10"></textarea>
                    </div>
                        <p class="formulario__input-error">Minimo 4 caracteres</p>
                </div>
                <!--Fin de grupo contacto-->
                <div class="formulario__mensaje" id="formulario__mensaje">
                    <p><i class="fas fa-exclamation-triangle"></i><b> Error </b>Favor de completar los campos correctamente</p>
                </div>
                <div class="formulario__grupo formulario__grupo_btn-enviar">
                    <input type="submit" id="enviar" class="btn btn-success" value="Enviar Correo">
                        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                </div>
            </form>
        </div>
    </div>
</div>