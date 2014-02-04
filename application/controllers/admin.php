<?php 
	
	class Admin extends Admin_Controller {
		
		public function __construct() {
			
			parent::__construct();
		}
		
		public function controlPanel() {
			echo 'heyo';
			$data['title'] = 'KronoSource Admin Control Panel';
			
			$this->load->view('templates/header', $data);
			$this->load->view('admin/controlPanel', $data);
			$this->load->view('templates/footer', $data);
		}
		
	}