<?php

	class Users extends CI_Controller {
		
		public function __construct(){
			
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
		
		public function register_locator() {
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('username','User Name','trim|required|min_length[6]|max_length[18]|xss_clean|is_unique[users.username]');
			$this->form_validation->set_rules('password','Password','trim|required|min_length[8]|max_length[18]');
			$this->form_validation->set_rules('password_verify','Password','matches[password]');
			$this->form_validation->set_rules('email','Email Address','trim|required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('email_verify','Email Address','matches[email]');
			$this->form_validation->set_rules('first_name','First Name','trim|required|alpha');
			$this->form_validation->set_rules('last_name','Last Name','trim|required|alpha');
			$this->form_validation->set_rules('display_name','Display Name','trim|required');
			$this->form_validation->set_rules('phone','Phone Number','trim|required');
			
			if($this->form_validation->run() === FALSE) {
				$data['title'] = 'New User Registration';
				$this->load->view('templates/header',$data);
				$this->load->view('register/locator',$data);
				$this->load->view('templates/footer',$data);
			} else {
				
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$additional_data = array (
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'phone' => $this->input->post('phone'),
					'company' => $this->input->post('company'),
					'display_name' => $this->input->post('display_name')
				);
				$group = array('2');
				$remember = TRUE;
				
				 if($this->ion_auth->register($username,$password,$email,$additional_data,$group)) {
				
					if($this->ion_auth->login($username, $password, $remember)){
				
						$this->the_user = $this->ion_auth->user()->row();
					
						$data['the_user'] = $this->the_user;
					
						$this->load->vars($data);
					
						redirect('/','refresh');
					}
				} else {
					redirect('/','refresh');
				}
			}
		}

		public function register_property() {
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('username','User Name','trim|required|min_length[6]|max_length[18]|xss_clean|is_unique[users.username]');
			$this->form_validation->set_rules('password','Password','trim|required|min_length[8]|max_length[18]');
			$this->form_validation->set_rules('password_verify','Password','matches[password]');
			$this->form_validation->set_rules('email','Email Address','trim|required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('email_verify','Email Address','matches[email]');
			$this->form_validation->set_rules('first_name','First Name','trim|required|alpha');
			$this->form_validation->set_rules('last_name','Last Name','trim|required|alpha');
			$this->form_validation->set_rules('display_name','Display Name','trim|required');
			$this->form_validation->set_rules('phone','Phone Number','trim|required');
			$this->form_validation->set_rules('property_name','Property Name','trim|required');
			$this->form_validation->set_rules('street','Street','trim|required');
			$this->form_validation->set_rules('city','City','trim|required');
			$this->form_validation->set_rules('zip','Zip Code','trim|required');
			
			if($this->form_validation->run() === FALSE) {
				$data['title'] = 'New Property Registration';
				$this->load->view('templates/header',$data);
				$this->load->view('register/property',$data);
				$this->load->view('templates/footer',$data);
			} else {
				
				$upload_data = Array();
				
				$config['upload_path'] = 'assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '1024';
				$config['max_width'] = '1024';
				$config['max_height'] = '1024';
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if(!$this->upload->do_upload()) {
					$error = array('error' => $this->upload->display_errors());
					foreach($error as $key => $value):
						echo $key.': '.$value.'<br/>';
					endforeach;
					$upload_data['file_name'] = 'none.jpg';
					return FALSE;
				} else {
					
					$upload_data = $this->upload->data();
					
					$img_config = Array();
					$img_config['image_library'] = 'gd2';
					$img_config['source_image']	= $upload_data['full_path'];
					$img_config['create_thumb'] = TRUE;
					$img_config['maintain_ratio'] = TRUE;
					$img_config['width']	 = 160;
					$img_config['height']	= 160;
					
					$this->load->library('image_lib', $img_config);
					$this->image_lib->resize();
				}
				
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$additional_data = array (
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'phone' => $this->input->post('phone'),
					'company' => $this->input->post('property_name'),
					'street' => $this->input->post('street'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'zip' => $this->input->post('zip'),
					'file_name' => '/assets/img/profile/'.$upload_data['file_name'],
					'display_name' => $this->input->post('display_name')
				);
				
				$group = array('3');
				$remember = TRUE;
				
				if($this->ion_auth->register($username,$password,$email,$additional_data,$group)) {
						 
					if($this->ion_auth->login($username, $password, $remember)){
						
						$this->the_user = $this->ion_auth->user()->row();
						
						$this->load->model('property_model');
						$this->property_model->add_features($this->the_user->id);
						
						$data['the_user'] = $this->the_user;
						
						$this->load->vars($data);
						
						redirect('/','refresh');
					}
					
				} else {
					redirect('/','refresh');
				}
			}
		}
		
		public function edit() {
			
			if(!$this->ion_auth->logged_in()){
				redirect('/');
			}
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('username','User Name','trim|required|min_length[6]|max_length[18]|xss_clean');
			$this->form_validation->set_rules('email','Email Address','trim|required|valid_email');
			$this->form_validation->set_rules('first_name','First Name','trim|required|alpha');
			$this->form_validation->set_rules('last_name','Last Name','trim|required|alpha');
			$this->form_validation->set_rules('phone','Phone Number','trim|required');
			
			$data['title'] = 'Edit Profile';
			
			if ($this->form_validation->run() === FALSE){
				
				$this->load->view('templates/header',$data);
				$this->load->view('users/edit',$data);
				$this->load->view('templates/footer',$data);
			} else {
				$id = $this->the_user->id;
				$update = $this->input->post();
				
				if($this->ion_auth->update($id,$update)) {
				
				redirect(base_url().'index.php/users/edit');
				}
			}
		}
		
		public function login() {
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('username','Email Address','required');
			$this->form_validation->set_rules('password','password','required');
			
			if ($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('login','Please enter a Username and Password.');
				redirect(base_url().'index.php/');
			}
			
			else {
				//GET CREDENTIALS FROM FORM, SUBMIT TO ION AUTH
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$remember = TRUE;
				
				if($this->ion_auth->login($username, $password, $remember)){
					//GET USER DETAILS FROM DATABASE AND PASS TO DATA OBJECT
					$this->the_user = $this->ion_auth->user()->row();
				
					$data['the_user'] = $this->the_user;
				
					$this->load->vars($data);
					
					if($this->ion_auth->is_admin()){
						//CONTROL PANEL
						redirect(base_url().'index.php/admin/controlPanel');
					} else {
						//BACK TO HOME SCREEN
						redirect(base_url().'index.php/');
					}
				} else {
					$this->session->set_flashdata('login','Login failed. Please check your credentials and try again.');
					redirect(base_url().'index.php/');
				} 
			}
		}
		
		public function logout() {
			
			if($this->ion_auth->logout()){
			redirect(base_url().'index.php/');
			}
		}
	}