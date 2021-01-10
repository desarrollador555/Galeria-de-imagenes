<div class="contenedor">
    <div class="grupo__imagen">
        <h1 class="tituloIndiviual"><?=$dato['titulo_imagen']?></h1>
        <img class="imagen" src="<?=$dato['archivo_imagen']?>" alt="error">
        <div class="grupo__descripcion">
            <h2 class="titulo">Descripcion</h2>
            <p class="descripcion"><?=$dato['descripcion_imagen']?></p>
        </div>
    </div>
    <div class="grupo__paginacion">
        <a class="btn btn-gray" href=""><i class="fas fa-arrow-left"></i> Izquierda</a>

        <a class="btn btn-gray" href="">Derecha <i class="fas fa-arrow-right"></i></a>
    </div>
</div>