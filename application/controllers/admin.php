<?php 
	
	class Admin extends Admin_Controller {
		
		public function __construct() {
			
			parent::__construct();
		}
		
		public function controlPanel() {
			
			$data['title'] = 'KronoSource Admin Control Panel';
			
			$this->load->view('templates/header', $data);
			$this->load->view('admin/controlPanel', $data);
			$this->load->view('templates/footer', $data);
		}
		
		public function regcodes($function = 'main') {
			
			$this->load->helper('form');
			$this->load->model('admin_model');
			
			$status = $this->session->flashdata('status');
			
			$date_input = array(
				'name' => 'exp',
				'id' => 'unit_date',
				'type' => 'text',
				'placeholder' => 'mm/dd/yyyy'
			);
			
			$type_dropdown = array(
				'locator' => 'Locator',
				'property' => 'Property'
			);
			
			if($function == 'deactivate') {
				
				$deactivated = $this->admin_model->deactivate_code($this->input->post('deactivate_id'));
				$this->session->set_flashdata('status', $deactivated);
				redirect('admin/regcodes');
			}
			
			if($function == 'add') {
				
				$exp = $this->convert_date_to_unix($this->input->post('exp'));
				
				$activated = $this->admin_model->add_code($this->input->post('code'), $this->input->post('type'), $exp);
				$this->session->set_flashdata('status', $activated);
				redirect('admin/regcodes');
			}
			
			$regcodes = $this->admin_model->get_codes();
			
			foreach($regcodes as &$regcode) {
				$exp =  $regcode['expiration'];
				$regcode['expiration'] = $this->convert_date_to_human($exp);
			}
			
			$data['date_input'] = $date_input;
			$data['type_dropdown'] = $type_dropdown;
			
			$data['regcodes'] = $regcodes;
			
			$data['title'] = 'KronoSource Registration Code Administration';
			$data['status'] = $status;
			
			$this->load->view('templates/header',$data);
			$this->load->view('admin/regcodes',$data);
			$this->load->view('templates/footer',$data);
		}
		
		private function convert_date_to_unix($date) {
			//YYYY-MM-DD HH:MM:SS AM/PM
			$this->load->helper('date');
			
			$year = substr($date, -4);
			$month = substr($date, 0, 2);
			$day = substr($date, 3, 2);
			$date = $year.'-'.$month.'-'.$day.' 11:59:59 PM';
			
			return human_to_unix($date);
		}
		
		private function convert_date_to_human($date) {
			//YYYY-MM-DD HH:MM:SS AM/PM
			$this->load->helper('date');
			
			$date = unix_to_human($date);
			
			$year = substr($date, 0, 4);
			$month = substr($date, 5, 2);
			$day = substr($date, 8, 2);
			$date = $month.'-'.$day.'-'.$year;
			
			return $date;
		}
		
	}