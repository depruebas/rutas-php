<?php

Class Home extends BaseController
{

	public function init( $params = null)
	{
		return (
			[
				'text' => "soy home - init",
				'params' => $params
			]
		);
	}

	public function listados( $params = null)
	{
		return (
			[
				'text' => "soy home - listados",
				'params' => $params
			]
		);
	}

}