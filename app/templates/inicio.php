<?php ob_start() ?>

<div class="container">
    <div class="formbg">
        <h3><?php echo $params['mensaje'] ?></h3>

        <?php if(isset($params['mensajeok'])) :?>
            <span>
                <?php echo $params['mensajeok'] ?>
            </span>
        <?php endif;?>

        <?php if(isset($params['mensajeout'])):?>
            <span>
                <?php echo $params['mensajeout']?>
            </span>
        <?php endif;?>
    </div>
</div>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>
