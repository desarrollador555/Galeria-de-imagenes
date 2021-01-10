<div class="contenedor">
    <h1 class="p-2">Galeria de imagenes</h1>
    <div class="gallery-container">
        <?php foreach($publicaciones as $publicacion): ?>
            <div class="gallery__item">
                <a href="index.php?c=galeria&a=view&id=<?=$publicacion['id_imagen']?>">
                    <img src="<?=$publicacion['archivo_imagen']?>" class="gallery__img" alt="">
                    <h2 class="gallery__title"><?=$publicacion['titulo_imagen']?></h2>
                </a>
            </div>
        <?php endforeach;?>
    </div>
    <?php require_once RUTA_ARCHIVOS."view/paginacion/paginacion.php" ?>
</div>
