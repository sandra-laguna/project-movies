<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>The Movie Database</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$vis_css ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$vis_bootstrap?>" />
<link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$vis_resetcss?>" />

<link rel="icon" type="image/x-icon" href="../web/imagenes/favicon.svg">

</head>
<body>
	
<?php 

if (!isset($_SESSION['menu'])){
    $menu='menu.php' ; 
}else 
    $menu = $_SESSION['menu'];
    include $menu;
?>

<div id="contenido">
    <?php echo $contenido ?>
</div>

</body>
</html>
