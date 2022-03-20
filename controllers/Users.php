<?php

Class Users extends BaseController
{

	public function init( $params = null)
	{
		return (
			[
				'text' => "soy Users - init",
				'params' => $params
			]
		);
	}

	public function login( $params = null)
	{
		return (
			[
				'text' => "soy Users - login",
				'params' => $params
			]
		);
	}

	public function registro( $params = null)
	{
		return (
			[
				'text' => "soy Users - registro",
				'params' => $params
			]
		);
	}

}