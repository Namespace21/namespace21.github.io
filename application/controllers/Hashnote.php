<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hashnote extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('urlencrypt_helper');
		$this->load->library('encrypt');

	}

	public function index()
	{
		$text= "The parent::__construct. If you don't do that; the Controller will not inherit it's abstract layer when you override the __construct in your own controller.

As long as you don't override your __construct it's all ok. It only happens when you override it. You don't have the load functionality because the Welcome class is empty (no inheritance), even if it extends the CI_Controller (but with a __construct override).";
		$_data  = array(
			'subject' => 'JWT token', 
			'text' => $text,
		);
		$_token = AUTHORIZATION::generateToken($_data);
		$decode = AUTHORIZATION::validateToken($_token);

		$header = AUTHORIZATION::get_jwt('header',$_token);
		$payload = AUTHORIZATION::get_jwt('payload',$_token);
		$sign = AUTHORIZATION::get_jwt('sign',$_token);
		// echo $header.'.'.$payload.'.'.$sign;
		// print_r($decode) ;
		echo $_token;
	}

	public function v()
	{
		$token = $this->input->get('_token');

		$crypt = new URLENCRYPT();
		$data = $crypt->decode($token);
		print_r($data);

	}

	public function json_tes()
	{
		$_data  = array(
			'_pwd' => NULL,
			'subject' => 'JWT token', 
			'text' => '$text',
		);


		$enkode =  $crypt->encode($_data);
		$decode =  $crypt->decode($enkode);
		echo $enkode;
		// print_r($decode);
	}
}
?>