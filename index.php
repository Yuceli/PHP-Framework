<?php
/**
* Controlador principal
*
* Contiene el controlador principal MVC,
* Carga el controlador, el modelo y la vista necesaria
*
* @package inicio
* @author Victor Hugo Menendez Dominguez <mdoming@uady.mx>
* @version 1.5
* @date 20/Abril/2009
*
**/

// Deshabilitar todo reporte de errores
error_reporting (E_ERROR | E_PARSE);

/** Cargar las variables globales de directorios y archivos de configuracion */
include ('config/variables.php');

/** Cargar las funciones generales */
include ('libs/funciones.php');

/**
* Controlador solicitado
* @global string $controlador
*/
$controlador = '';

/**
* Accion solicitada
* @global string $accion
*/
$accion = '';

// Cargar controlador y accion, sino existen se cargan los predefinidos
// definidos en variables.php
if (! empty ($variables_ruta[$controlador_id]))
	$controlador = $variables_ruta[$controlador_id];
else
	$controlador = $controlador_predefinido;

if (! empty ($variables_ruta[$accion_id]))
	$accion = $variables_ruta[$accion_id];
else
	$accion = $accion_predefinida;
	
// Formamos el nombre del archivo que contiene nuestro controlador
$controlador_archivo = 'controlador/' . $controlador . $controlador_extension;

// Incluimos el controlador o detenemos todo si no existe
if (file_exists ($controlador_archivo))
	include ($controlador_archivo);
else {
	echo 'Controlador ' . $controlador . ' no existe.';
}

// Llamamos la accion o detenemos todo si no existe
$accion_funcion = 'accion_' . $accion;
if (is_callable ($accion_funcion)) {
	$accion_funcion ();
} else {
	echo 'Controlador' . $controlador . '.' .  $accion . ' no existe.';
}

?>