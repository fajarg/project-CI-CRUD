<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct()
	{
		// Most services in this controller require
		// the session to be started - so fire it up!
		$this->session = service('session');
		$this->auth = service('authentication');
	}

	public function index()
	{
		if (!$this->auth->check()) {
			$redirectURL = session('redirect_url') ?? site_url('/login');
			unset($_SESSION['redirect_url']);

			return redirect()->to($redirectURL);
		}

		$data = [
			'judul' => 'Homepage'
		];
		echo view('template/v_header', $data);
		echo view('template/v_sidebar');
		echo view('template/v_topbar');
		echo view('Home/index');
		echo view('template/v_footer');
	}



	//--------------------------------------------------------------------

}
