    <div class="grupo__paginacion">
            <?php if($paginaActual==1): ?>
                <a class="btn btn-gray" href="index.php?c=<?=$controller?>&a=<?=$action?>&p=<?=$paginaActual?>"><i class="fas fa-arrow-left"></i> Izquierda</a>
            <?php else: ?>
                <a class="btn btn-gray" href="index.php?c=<?=$controller?>&a=<?=$action?>&p=<?=$paginaActual-1?>"><i class="fas fa-arrow-left"></i> Izquierda</a>
            <?php endif; ?>
            <?php if($paginaActual>=$totalPaginas): ?>
                <!-- <a class="btn btn-gray" style="cursor: not-allowed;" href="index.php?c=<?=$controller?>&a=<?=$action?>&p=<?=$paginaActual?>"><i class="fas fa-arrow-right"></i> Derecha</a> -->
                <a class="btn btn-gray" style="cursor: not-allowed; color:white;"><i class="fas fa-arrow-right"></i> Derecha</a>
            <?php else: ?>
                <a class="btn btn-gray" href="index.php?c=<?=$controller?>&a=<?=$action?>&p=<?=$paginaActual+1?>"><i class="fas fa-arrow-right"></i> Derecha</a>
            <?php endif; ?>
    </div>