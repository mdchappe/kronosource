<?php 
	class Property extends Property_Auth_Controller {
		
		public function __construct() {
			
			parent::__construct();
			
			$this->load->model('property_model');
		}
		
		public function manage(){
			
			$data['title'] = 'Manage '.$this->the_user->company;
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('first_name','First Name','trim|required|alpha');
			$this->form_validation->set_rules('last_name','Last Name','trim|required|alpha');
			$this->form_validation->set_rules('phone','Phone Number','trim|required');
			$this->form_validation->set_rules('property_name','Property Name','trim|required');
			$this->form_validation->set_rules('street','Street','trim|required');
			$this->form_validation->set_rules('city','City','trim|required');
			$this->form_validation->set_rules('zip','Zip Code','trim|required');
			
			if($this->input->post('username') != $this->the_user->username){
				$this->form_validation->set_rules('username','User Name','trim|required|min_length[6]|max_length[18]|xss_clean|is_unique[users.username]');
			}
			
			if($this->input->post('password')!=''){
				$this->form_validation->set_rules('password','Password','trim|min_length[8]|max_length[18]');
				$this->form_validation->set_rules('password_verify','Password','matches[password]');
			}
			
			if($this->input->post('email') != $this->the_user->email){
				$this->form_validation->set_rules('email','Email Address','trim|required|valid_email|is_unique[users.email]');
				$this->form_validation->set_rules('email_verify','Email Address','matches[email]');
			}
			
			if($this->form_validation->run() === FALSE || $this->session->flashdata('status')) {
				
				if($this->session->flashdata('status')){
					$data['status'] = $this->session->flashdata('status');
				}
				
				$features = $this->property_model->get_features($this->the_user->id);
				foreach($features as $feature => $value):
					if($value && $feature != 'id' && $feature != 'property_id' && $feature != 'cable' && $feature != 'trash' && $feature != 'management') {
						$data[$feature] = TRUE;
					} else if($feature == 'cable' || $feature == 'trash' || $feature == 'management'){
						$data[$feature] = $value;
					} else {
						$data[$feature] = FALSE;
					}
				endforeach;
				
				$units = $this->property_model->get_units($this->the_user->id);
				$data['units'] = $units;
				
				$this->load->view('templates/header',$data);
				$this->load->view('property/manage',$data);
				$this->load->view('templates/footer',$data);
			} else {
				
				$user_data = array (
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'phone' => $this->input->post('phone'),
					'company' => $this->input->post('property_name'),
					'street' => $this->input->post('street'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'zip' => $this->input->post('zip')
				);
				
				if($this->input->post('password') != ''){
					$user_data['password'] = $this->input->post('password');
				}
				
				$this->property_model->update_features($this->the_user->id);
				if($this->ion_auth->update($this->the_user->id, $user_data)){
					
					$this->session->set_flashdata('status','<p>Property information updated.</p>');
					redirect(base_url().'index.php/property/manage');
				}
			}
		}
		
		public function add_unit() {
			
			$data['title'] = $this->the_user->company.': Add Unit';
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			//FORM VALIDATION RULES HERE
			$this->form_validation->set_rules('unit_beds','Bedrooms','trim|required');
			$this->form_validation->set_rules('unit_baths','Baths','trim|required');
			$this->form_validation->set_rules('unit_floor','Floor','trim|required');
			$this->form_validation->set_rules('unit_name','Unit Description','trim|required');
			$this->form_validation->set_rules('unit_size','Unit Size','trim|required');
			$this->form_validation->set_rules('lease_term_0','Lease Term','trim|required');
			$this->form_validation->set_rules('monthly_rent_0','Monthly Rent','trim|required');
			
			if($this->form_validation->run() === FALSE) {
			
				$date_input = array(
					'name' => 'unit_date',
					'id' => 'unit_date',
					'type' => 'text',
					'placeholder' => 'mm/dd/yyyy'
				);
				
				$direction_dropdown = array(
					'N' => 'N',
					'NE' => 'NE',
					'E' => 'E',
					'SE' => 'SE',
					'S' => 'S',
					'SW' => 'SW',
					'W' => 'W',
					'NW' => 'NW'
				);
				
				$washer_dropdown = array(
					'none' => 'none',
					'connection' => 'connection',
					'side_by_side' => 'side by side',
					'stacked' => 'stacked'
				);
				
				$requirements_input = array(
					'name' => 'unit_requirements',
					'id' => 'unit_requirements',
					'rows' => '5',
					'cols' => '40'
				);
				
				$specials_input = array(
					'name' => 'unit_specials',
					'id' => 'unit_specials',
					'rows' => '5',
					'cols' => '40'
				);
				
				$data['date_input'] = $date_input;
				$data['direction_dropdown'] = $direction_dropdown;
				$data['washer_dropdown'] = $washer_dropdown;
				$data['requirements_input'] = $requirements_input;
				$data['specials_input'] = $specials_input;
				
				$this->load->view('templates/header',$data);
				$this->load->view('property/add_unit',$data);
				$this->load->view('templates/footer',$data);
			} else {
				//ADD UNIT VIA PROPERTY_MODEL
				if($this->property_model->add_unit($this->the_user->id)){
					
					$data['unit_name'] = $this->input->post('unit_name');
					
					$this->load->view('templates/header',$data);
					$this->load->view('property/add_unit_success', $data);
					$this->load->view('templates/footer',$data);
				} else {
					$this->load->view('templates/header',$data);
					$this->load->view('property/add_unit',$data);
					$this->load->view('templates/footer',$data);
				}
			}
		}
		
		public function update_unit($id) {
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$data['title'] = 'Update Unit Details';
			
			$this->form_validation->set_rules('unit_beds','Bedrooms','trim|required');
			$this->form_validation->set_rules('unit_baths','Baths','trim|required');
			$this->form_validation->set_rules('unit_floor','Floor','trim|required');
			$this->form_validation->set_rules('unit_name','Unit Description','trim|required');
			$this->form_validation->set_rules('unit_size','Unit Size','trim|required');
			
			if($this->property_model->check_unit_owner($id)['property_id'] != $this->the_user->id){
				$this->session->set_flashdata('login','<p>You have tried to access unauthorized content. Please log in with an authorized account and try again.</p>');
				redirect(base_url().'index.php/');
			} else if($this->form_validation->run() === FALSE) {
				
				//POPULATE FORM WITH EXISTING VALUES
				$data['unit_id'] = $id;
				$data['unit'] = $this->property_model->get_unit($id);
				$data['rent'] = $this->property_model->get_rent($id);
				
				$unit = $data['unit'];
				$db_date = $unit->date_available;
				$year = substr($db_date,0,4);
				$month = substr($db_date,5,2);
				$day = substr($db_date,-2);
				$data['date'] = $month.'/'.$day.'/'.$year;
				
				$date_input = array(
					'name' => 'unit_date',
					'id' => 'unit_date',
					'type' => 'text',
					'placeholder' => 'mm/dd/yyyy'
				);
				
				$direction_dropdown = array(
					'N' => 'N',
					'NE' => 'NE',
					'E' => 'E',
					'SE' => 'SE',
					'S' => 'S',
					'SW' => 'SW',
					'W' => 'W',
					'NW' => 'NW'
				);
				
				$washer_dropdown = array(
					'none' => 'none',
					'connection' => 'connection',
					'side_by_side' => 'side by side',
					'stacked' => 'stacked'
				);
				
				$requirements_input = array(
					'name' => 'unit_requirements',
					'id' => 'unit_requirements',
					'rows' => '5',
					'cols' => '40'
				);
				
				$specials_input = array(
					'name' => 'unit_specials',
					'id' => 'unit_specials',
					'rows' => '5',
					'cols' => '40'
				);
				
				$data['date_input'] = $date_input;
				$data['direction_dropdown'] = $direction_dropdown;
				$data['washer_dropdown'] = $washer_dropdown;
				$data['requirements_input'] = $requirements_input;
				$data['specials_input'] = $specials_input;
				
				$this->load->view('templates/header',$data);
				$this->load->view('property/update_unit',$data);
				$this->load->view('templates/footer',$data);
				
			} else {
				
				$count = $this->input->post('lease_term_count');
				$i = 1;
				while($i <= $count) {
					
					$params = array();
					$params['term'] = $this->input->post('lease_term_'.$i);
					$params['rent'] = $this->input->post('monthly_rent_'.$i);
					$params['deposit'] = $this->input->post('deposit_'.$i);
					$params['pet_rent'] = $this->input->post('pet_rent_'.$i);
					$params['pet_deposit'] = $this->input->post('pet_deposit_'.$i);
					$params['unit_id'] = $id;
					
					$this->property_model->add_lease_term($params);
					
					$i++;
				}
				
				if($this->property_model->update_unit($id)) {
					
					$this->session->set_flashdata('status','Unit successfully updated.');
					redirect(base_url().'index.php/property/manage');
				}
			}
		}
		
		public function update_lease_term($id) {
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('lease_term','Lease Term','trim|required');
			$this->form_validation->set_rules('monthly_rent','Monthly Rent','trim|required');
			
			$data['title'] = 'Update Lease Details';
			
			if($this->property_model->check_lease_owner($id)['property_id'] != $this->the_user->id){
				$this->session->set_flashdata('login','<p>You have tried to access unauthorized content. Please log in with an authorized account and try again.</p>');
				redirect(base_url().'index.php/');
			}
			
			else if($this->form_validation->run() === FALSE) {
				
				$data['term'] = $this->property_model->get_lease_term($id);
				
				$this->load->view('templates/header',$data);
				$this->load->view('property/update_lease_term',$data);
				$this->load->view('templates/footer',$data);
				
			} else {
				
				if($this->property_model->update_lease_term($id)) {
					
					$this->session->set_flashdata('status','<p>Lease term updated successfully.</p>');
					$unit_id = $this->property_model->get_lease_term($id)['unit_id'];
					redirect('/property/update_unit/'.$unit_id);
				}
			}
		}
		
		public function delete_unit($id) {
			
			if($this->property_model->check_unit_owner($id)['property_id'] != $this->the_user->id){
				$this->session->set_flashdata('login','<p>You have tried to access unauthorized content. Please log in with an authorized account and try again.</p>');
				redirect(base_url().'index.php/');
			}
			
			else {
				if($this->property_model->delete_unit($id)) {
					
					$this->session->set_flashdata('status','Unit successfully deleted.');
					redirect(base_url().'index.php/property/manage');
				}
			}
		}
		
		public function delete_lease_term($id) {
			
			if($this->property_model->check_lease_owner($id)['property_id'] != $this->the_user->id){
				$this->session->set_flashdata('login','<p>You have tried to access unauthorized content. Please log in with an authorized account and try again.</p>');
				redirect(base_url().'index.php/');
			} else {
				
				if($this->property_model->delete_lease_term($id)){
					
					$unit_id = $this->property_model->check_lease_owner($id)['id'];
					
					$this->session->set_flashdata('status','Lease Term successfully deleted.');
					redirect(base_url().'index.php/property/update_unit/'.$unit_id);
				}
			}
		}
	}