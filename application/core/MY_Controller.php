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
				
				//Store user in $data.
				$data['the_user'] = $this->the_user;
				
				//Load $the_user in all views.
				$this->load->vars($data);
			}
			
			else {
				redirect('/');
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
				
				$data['the_user'] = $this->the_user;
				
				$this->load->vars($data);
			}
			
			else {
				redirect('/');
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
				
				$data['the_user'] = $this->the_user;
				
				$this->load->vars($data);
			}
			
			else {
				redirect('/');
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
				
				$data['the_user'] = $this->the_user;
				
				$this->load->vars($data);
			}
			
			else {
				redirect('/');
			}
		}
	}