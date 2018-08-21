<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Pages extends CI_Controller 
	{
		
		public function view($page = 'home'){
			if( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}

			$data['title'] = ucfirst($page);

			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
		function aboutus(){
			$this->load->view('templates/header');
			$this->load->view('pages/aboutus');
			$this->load->view('templates/footer');
		}
		function services(){
			$this->load->view('templates/header');
			$this->load->view('pages/services');
			$this->load->view('templates/footer');
		}
		function contact(){
			$this->load->view('templates/header');
			$this->load->view('pages/contact');
			$this->load->view('templates/footer');
		}
		function gallery(){
			$this->load->view('templates/header');
			$this->load->view('pages/gallery');
			$this->load->view('templates/footer');
		}
	}
