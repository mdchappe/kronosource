<?php
	
	class Admin_Controller extends CI_Controller {
		
		//Class-wide variable to store the user object in.
		protected $the_user;
		
		public function __construct() {
			
			parent::__construct();
			
			//Check if this user is in the Admin group.
			if( $this->ion_auth->is_admin()) {
				
				//Put the user in the class-wide variable.
				$this->the_user = $this->ion_auth->user()->row();
				
				//Put group name into user object.
				$this->the_user->group = $this->ion_auth->get_users_groups()->result()[0]->name;
				
				//get unread message count
				$this->load->model('message_model');
				$this->the_user->unread = $this->message_model->count_unread($this->the_user->id);
				
				//Store user in $data.
				$data['the_user'] = $this->the_user;
				
				//Load $the_user in all views.
				$this->load->vars($data);
			}
			
			else {
				$this->session->set_flashdata('login','You are either not logged in or are trying to access restricted content.');
				redirect(base_url().'index.php/');
			}
		}
	}
	
	class Locator_Auth_Controller extends CI_Controller {
		
		protected $the_user;
		
		public function __construct() {
			
			parent::__construct();
			
			if( $this->ion_auth->in_group('locator') || $this->ion_auth->is_admin()) {
				
				$this->the_user = $this->ion_auth->user()->row();
				
				$this->the_user->group = $this->ion_auth->get_users_groups()->result()[0]->name;
				
				$this->load->model('message_model');
				$this->the_user->unread = $this->message_model->count_unread($this->the_user->id);
				
				$data['the_user'] = $this->the_user;
				
				$this->load->vars($data);
				
				$this->load->model('announcement_model');
				
				$data['announcement'] = $this->announcement_model->get_announcements('locator');
			}
			
			else {
				$this->session->set_flashdata('login','You are either not logged in or are trying to access restricted content.');
				redirect(base_url().'index.php/');
			}
		}
	}
		
	class Property_Auth_Controller extends CI_Controller {
		
		protected $the_user;
		
		public function __construct() {
			
			parent::__construct();
			
			if( $this->ion_auth->in_group('property') || $this->ion_auth->is_admin()) {
				
				$this->the_user = $this->ion_auth->user()->row();
				
				$this->the_user->group = $this->ion_auth->get_users_groups()->result()[0]->name;
				
				$this->load->model('message_model');
				$this->the_user->unread = $this->message_model->count_unread($this->the_user->id);
				
				$data['the_user'] = $this->the_user;
				
				$this->load->vars($data);
				
				$this->load->model('announcement_model');
				
				$data['announcement'] = $this->announcement_model->get_announcements('property');
			}
			
			else {
				$this->session->set_flashdata('login','You are either not logged in or are trying to access restricted content.');
				redirect(base_url().'index.php/');
			}
		}
	}
		
	class Common_Auth_Controller extends CI_Controller {
			
		protected $the_user;
		
		public function __construct() {
			
			parent::__construct();
			
			if($this->ion_auth->logged_in()) {
				
				$this->the_user = $this->ion_auth->user()->row();
				
				$this->the_user->group = $this->ion_auth->get_users_groups()->result()[0]->name;
				
				$this->load->model('message_model');
				$this->the_user->unread = $this->message_model->count_unread($this->the_user->id);
				
				$data['the_user'] = $this->the_user;
				
				$this->load->vars($data);
			}
		}
	}