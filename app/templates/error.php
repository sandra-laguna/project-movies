<?php ob_start();
if (isset($params['mensaje'])) {?>
<div class="alert alert-danger" role="alert">
    <?php
        echo $params['mensaje'];
    }?>
</div>

<div class="alert alert-danger" role="alert">
    <h3>Ha habido un error</h3>
</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
