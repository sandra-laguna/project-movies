<?php ob_start() ?>

<div class="container">
  <div class="formbg">

    <img src="../web/imagenes/logo.svg"/>

    <div class="title">
	    <h1>Login</h1>
	  </div>

    <?php if(isset($params ['mensaje'])) :?>
      <div class="alert alert-danger" role="alert"><?php echo $params['mensaje'] ?></div>
    <?php endif; ?>

    <form name ="login" action="" method="post">
      <div class="input-form">
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
      </div>
      <div class="input-form">
        <input type="password" class="form-control" id="pwd" name="password" placeholder="Contraseña">
      </div>
      <input type="submit" class="btn-login w-100" value="Login" name="login">
    </form>

    <div class="formFooter">
        <span class="text">¿Aún no eres miembro?</span>
        <a href="index.php?ctl=registrar">Registrate aquí</a>
    </div>
  
  </div>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>