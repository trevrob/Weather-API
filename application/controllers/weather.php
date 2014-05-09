<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weather extends CI_Controller {

	public function index()
	{
		$this->load->view('weather_view');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */