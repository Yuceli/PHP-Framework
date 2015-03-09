<?php
/**
* Vista de la pagina de busqueda
*
* Contiene la plantilla para presentar la pagina de busqueda de recursos
*
* @package recurso
* @author Victor Hugo Menendez Dominguez <mdoming@uady.mx>
* @version 1.5
* @date 20/Abril/2009
**/
?>

<html>
<head>
	<title><?php echo $aplicacion; ?></title>
</head>
<body>
	<h1><?=$titulo?></h1>
	<form method="post" action="<?php echo $url_base ?>recurso/json">
		Cadena: <input type="text" name="entrada"/>
		<input type="submit" value="Enviar">
	</form>
</body>