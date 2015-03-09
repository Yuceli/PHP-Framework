<?php
/**
* Gestor de URL amigables
*
* Contiene las funciones para el control de la URL
* que llega como parametro al servidor
*
* @package libreria
* @author Victor Hugo Menendez Dominguez <mdoming@uady.mx>
* @version 1.5
* @date 11/Abril/2009
**/


/**
* Toma una cadena y eliminar todos los caracteres no deseados. Solo letras(a-Z), numeros y guiones
*
* @param string $valor La cadena a filtrar
* @return string La cadena ya filtrada
*/
function limpiar($valor){

	// permitimos solo letras(a-Z), numeros y guiones
	return preg_replace('/[^a-zA-Z0-9-_.@ ]/', '', $valor);
}

/**
* Convierte una URL en un arreglo
*
* @param string $url La URL a colocar en un arreglo
* @return array Los elementos de la URL dentro de un arreglo
*
* @uses limpiar
*/
function getVariables($url){

	// quitamos la barra del final
	$url = preg_replace('/\/$/', '', $url);

	// separamos las partes/variables de la url y las contamos
	$variables = explode('/', $url);	
	$cantVariables = count($variables);
	
	for($c = 0; $c < $cantVariables; $c++){
		// Acumulamos los valores en un arreglo
		$variables[$c] = limpiar($variables[$c]);
	}
	
	return $variables;
}

/**
* Una URL almacenada como un arreglo
* @global array $variables_ruta
*
* @uses getVariables
*/
$variables_ruta = getVariables($_GET['ruta']);

/**
* Posicion del controlador en la variable $variables_ruta
* @global integer $controlador_id
*/
$controlador_id = 0;

/**
* Posicion de la accion en la variable $variables_ruta
* @global integer $accion_id
*/
$accion_id = 1;
?>