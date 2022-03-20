<?php

# Ejemplo de URL
#
#    http://rutas.local/home/listados/param1/param2/param3
#
#    donde:   home es el controlador a cargar, en este ejemplo Home.php
#    					listados es el metodo
#    					param1 ... param3 son los parametros que le pasamos al metodo
#
#
Class RoutingManager
{

	public function init()
	{

		# No hay parametros, con lo que no hay controlador ni metodo
		# Y utilizamos uno por defecto.
		if ( $_SERVER['REQUEST_URI'] == '/')
		{
			$controller = "Home";
			$method = "init";
		}
		else
		{
			# Recogemos la url para saber que controlador y metodo que nos estan pidiendo
			# y lo ponemos en un array
			$request_uri = explode ("/", $_SERVER['REQUEST_URI']);
		}

		# Obtenemos el controlador que sera el primer parametro despues del dominio
		if ( isset( $request_uri[1]))
		{
			$controller = ucfirst( $request_uri[1]);
		}

		# Miramos si viene le metodo, que es el sugundo parametro de la url
		# si no viniera podriamos poner uno por defecto
		if ( isset( $request_uri[2]))
		{
			$method  = $request_uri[2];
		}
		else
		{
			$method = "init";
		}

		# Ahora recogemos los parametros, que es todo lo que venga despues del metodo
		# y por si vienen multiples parametros los ponemos en un array
		#
		$params = [];
		if ( isset( $request_uri[3]))
		{
			for ( $i = 3; $i < count($request_uri); $i++)
			{
				$params[] = $request_uri[$i];
			}
		}

		# Cargamos la clase y el metodo que nos piden

		$controller_file = dirname(__FILE__)."/controllers/".$controller.".php";

		# Si el fichero del controlador existe, lo cargamos y lo instanciamos.
		if ( file_exists( $controller_file))
  	{
  		require_once dirname(__FILE__)."/controllers/BaseController.php";
			require_once $controller_file;

			$class_controller = new $controller();

			# Si el metodo existe lo instanciamos y ejecutamos lo que tiene que hacer
			# pasandole los parametros que necesite.
			if ( method_exists( $class_controller, $method))
			{
				$return = $class_controller->{$method} ( $params);
			}
			else
			{
				$return = "Method not found";
			}

  	}
		else
		{
			$return =  "file not exist";
		}

		# Devolvemos el resultado.
		return( $return);
	}

}