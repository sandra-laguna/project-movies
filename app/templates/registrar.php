<?php ob_start() ?>

<div class="container">
  <div class="formbg">

    <?php if(isset($params ['mensaje'])) :?>
      <div class="alert alert-danger" role="alert"><?php echo $params['mensaje'] ?></div>
    <?php endif; ?>

    <?php if(isset($params ['mensajeok'])) :?>
      <div class="alert alert-success" role="alert"><?php echo $params['mensajeok'] ?></div>

      <ul class="navlinks">
      <li>
          <button>
              <a href="index.php?ctl=login">Iniciar sesión</a>
          </button>   
      </li>
      </ul> 
    <?php endif; ?>

    <?php if(!isset($params ['mensajeok'])) :?>

      <img src="../web/imagenes/logo.svg"/>

      <div class="title">
        <h1>Registro</h1>
      </div>

      <form name="fregistro" action="index.php?ctl=registrar" method="POST">
        <div class="input-form">
          <input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php echo $params['usuario'] ?>" />
        </div>
        <div class="input-form">
          <input type="password"  class="form-control" name="password" placeholder="Contraseña" value="<?php echo $params['password'] ?>" />
        </div>
        <input type="submit" class="btn-login w-100" value="Registrarme" name="registro">
      </form>

      <div class="formFooter">
          <span class="text">¿Ya tienes una cuenta?</span>
          <a href="index.php?ctl=login">Accede</a>
      </div>
    <?php endif; ?>
  
  </div>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>
