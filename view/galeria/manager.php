<div class="model" class="model-activo">
    <div class="grupo__eliminacion">
        <p class="titulo">Desea eliminar el registro con el id</p>
        <div class="botones">
            <button class="btn btn-danger" id="borrar">Eliminar</button>
            <button onclick="cancelar()" class="btn btn-success" id="cancelar">Cancelar</button>
        </div>
    </div>
</div>
<div class="contenedor">
<div class="container mt-4">
        <div class="row">
            <div class="col lg-12">
                <table class="table" id="example">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Archivo</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($datos as $dato): ?>
                        <tr>
                            <th scope="row"><?= $dato['id_imagen']?></th>
                            <td><?= $dato['titulo_imagen']?></td>
                            <td>
                            <img style="height: 50px;" class="" src="<?= $dato['archivo_imagen']?>" alt="">
                            </td>
                            <td><?= $dato['descripcion_imagen']?></td>
                            <td>
                                <a class="btn btn-primary" href="index.php?c=galeria&a=view&id=<?= $dato['id_imagen']?>"><i class="far fa-eye"></i></a>
                                <a class="btn btn-success" href="index.php?c=galeria&a=update&id=<?= $dato['id_imagen']?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger eliminar" href="index.php?c=galeria&a=delete&id=<?= $dato['id_imagen']?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
