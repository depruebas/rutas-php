<?php

	# Incluimos la clase que nos hara el rotuing
	require_once "RoutingManager.php";

	# Instanciamos la clase routing para extraer la ruta de la url.
	$routes = new RoutingManager();
	$return = $routes->init();

	# Escribimos por pantalla el resultado
	echo "<pre>";
	print_r( $return);

