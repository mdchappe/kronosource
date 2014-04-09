<?php
	class Payment extends Common_Auth_Controller {
		
		public function __construct(){
			
			parent::__construct();
			
		}
		
		public function renew() {
			
			$this->load->helper('form');
			
			$data['rate'] = 10;
			
			if($this->session->flashdata('status')) {
				$data['status'] = $this->session->flashdata('status');
			}
					
			$data['title'] = 'Renew KronoSource Access';
			$this->load->view('templates/header',$data);
			$this->load->view('payment/renew',$data);
			$this->load->view('templates/footer',$data);
		}
		
		public function pay() {
			
			$months = $this->input->post('months');
			$total = $months * 10;
			
			$data['months'] = $months;
			$data['total'] = $total;
			
			$data['title'] = 'Renew KronoSource Access';
			$this->load->view('templates/header',$data);
			$this->load->view('payment/pay',$data);
			$this->load->view('templates/footer',$data);
		}
	}