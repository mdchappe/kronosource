<?php

	class Pages extends CI_Controller {
		
		public function __construct() {
			
			parent::__construct();
			
			if(!$this->ion_auth->logged_in()) {
			} 
			
			else {
				$this->the_user = $this->ion_auth->user()->row();
				
				$this->the_user->group = $this->ion_auth->get_users_groups()->result()[0]->name;
				
				$data['the_user'] = $this->the_user;
				
				$this->load->vars($data);	
			}
		}
		
		public function view($page = 'home') {
			
			$this->load->helper('form');
			$this->load->helper('captcha');
			$this->load->database();
			$this->load->library('form_validation');
			
			if ( ! file_exists('application/views/pages/'.$page.'.php')) {
				//page not found - show 404 page instead
				show_404();
			}
			
			$data['title'] = 'KronoSource '.ucfirst($page); //make first letter of page name uppercase
			$data['status'] = $this->session->flashdata('status');
			$data['regcode'] = ($this->session->flashdata('regcode') ? $this->session->flashdata('regcode') : '');
			$data['home'] = TRUE;
			
			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer', $data);
		}
		
		public function register() {
			
			$data['title'] = 'Registration Form';
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('regcode','Registration code','required');
			
			if ($this->form_validation->run() === FALSE){
				
				redirect(base_url().'index.php/');
			} else {
				
				if(!$this->ion_auth->logged_in()) {
				
					$code = $this->input->post('regcode');
					
					$this->load->model('preregistration_model');
					$user_type = $this->preregistration_model->check_registration_code($code);
					
					if(!empty($user_type) && $user_type['active'] == 1){
						
						$this->load->view('templates/header',$data);
						$this->load->view('register/'.$user_type['usertype'],$data);
						$this->load->view('templates/footer',$data);
					} else {
						
						$this->session->set_flashdata('register','<p class="error"><i class="icon-warning-sign"></i> Please check your code and try again</p>');
						$this->session->set_flashdata('regcode',$this->input->post('regcode'));
						redirect(base_url().'index.php/');
					}
				} else {
					
					$this->session->set_flashdata('register','You are already logged in.  Please log out if you wish to register a new account with a new registration code.');
					redirect(base_url().'index.php/');
				}
			}
		}
		
		public function contactform() {
			$this->load->library('form_validation');
			$this->load->library('email');
			
			$this->form_validation->set_rules('email','Email Address','trim|required|valid_email');
			$this->form_validation->set_rules('email_verify','Validate Email Address','matches[email]');
			$this->form_validation->set_rules('name','Name','trim|required');
			$this->form_validation->set_rules('company','Company','trim');
			$this->form_validation->set_rules('phone','Phone Number','trim|required');
			$this->form_validation->set_rules('account_type','I am or represent a','required');
			$this->form_validation->set_rules('contact','Contact Preference','trim');
			
			if($this->form_validation->run() === FALSE) {
				
				$this->view();
			} else {
				// First, delete old captchas
				$expiration = time()-7200; // Two hour limit
				$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
				
				// Then see if a captcha exists:
				$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
				$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
				$query = $this->db->query($sql, $binds);
				$row = $query->row();

				if ($row->count == 0) {
					$this->session->set_flashdata('status','Catpcha mismatch. Please try again.');
					redirect('/');
				} else {
					
					$this->email->from($this->input->post('email'), $this->input->post('name'));
					$this->email->to('owtytrof@gmail.com');
					
					$this->email->subject('KronoSource inquiry.');
					
					$name = $this->input->post('name');
					$company = $this->input->post('company');
					$email = $this->input->post('email');
					$phone = $this->input->post('phone');
					$contact = $this->input->post('contact');
					$account_type = $this->input->post('account_type');
					
					$message = 'Please contact me with more information about KronoSource.com.'.PHP_EOL.'Name: '.$name.PHP_EOL.'Company: '.$company.PHP_EOL.'Phone: '.$phone.PHP_EOL.'Email: '.$email.PHP_EOL.'I am or represent a: '.$account_type.PHP_EOL.'I prefer to communicate via:'.$contact;
					
					$this->email->message($message);	
					
					$this->email->send();
					
					$data['title'] = 'Contact form submitted successfully.';
					
					$this->load->view('templates/header', $data);
					$this->load->view('templates/contact_success', $data);
					$this->load->view('templates/footer', $data);
				}
			}
		}
	}