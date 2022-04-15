<nav>
  <!-- Logo -->
  <a href="list.php"><img src="../web/imagenes/logo.svg" height="50px"/></a>

    <!-- Menú sin usuario logueado -->
    <?php if(!isset($_SESSION['datos']['usuario'])) :?>
      <ul class="navlinks">
      <li>
          <button>
              <a href="index.php?ctl=login">Iniciar sesión</a>
          </button>   
      </li>
      <li>
          <a href="search.php" class="btn-circle">
            <img src="../web/imagenes/search.svg" height="18px"/>
          </a>
      </li>
    </ul>
		<?php endif; ?>

    <!-- Menú con usuario logueado -->
		<?php if(isset($_SESSION['datos']['usuario'])) :?>
      <ul class="navlinks">
      <li>
          <a href="addmovie.php" class="btn-circle">
              <img src="../web/imagenes/add.svg" height="18px"/>
          </a>
        </li>
        <li>
            <a href="search.php" class="btn-circle">
              <img src="../web/imagenes/search.svg" height="18px"/>
            </a>
        </li>
        <li class="usuario">  
            <img class="imgPerfil" src="data:image/;base64,<?php echo "". base64_encode($_SESSION ['datos']['imgperfil'])?>"/>
            <div class="dropdown-content">
                <span class="navbar-element"><?php echo $_SESSION['datos']['usuario'] ?></span>
                <a class="navbar-element" href="index.php?ctl=logout">Log out</a>
            </div>
        </li>
        
      </ul>
		<?php endif; ?>
    
</nav>

