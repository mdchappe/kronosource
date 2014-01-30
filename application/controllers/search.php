<?php 
	
	class Search extends Locator_Auth_Controller {
		
		public function __construct() {
			
			parent::__construct();
			$this->load->model('search_model');
		}
		
		public function properties() {
		/*
		//INPUTS
		'property_name'
		'management'
		'city'
		'zip'
		'cable'
		//CHECKBOXES
		'fitness'
		'clubhouse'
		'blinds'
		'ceilings'
		'pool'
		'laundry'
		'business'
		'wifi'
		'gated'
		'fireplace'
		'elevator'
		'storage'
		'parking'
		'court'
		'dog'
		'cat'
		'dog_park'
		//DROPDOWN
		'trash'
		*/
		
			$params = array();
			$params['users.company'] = $this->input->post('property_name');
			$params['management'] = $this->input->post('management');
			$params['users.city'] = $this->input->post('city');
			$params['users.zip'] = $this->input->post('zip');
			$params['cable'] = $this->input->post('cable');
			$params['fitness'] = $this->input->post('fitness');
			$params['clubhouse'] = $this->input->post('clubhouse');
			$params['blinds'] = $this->input->post('blinds');
			$params['ceilings'] = $this->input->post('ceilings');
			$params['pool'] = $this->input->post('pool');
			$params['laundry'] = $this->input->post('laundry');
			$params['business'] = $this->input->post('business');
			$params['wifi'] = $this->input->post('wifi');
			$params['gated'] = $this->input->post('gated');
			$params['fireplace'] = $this->input->post('fireplace');
			$params['elevator'] = $this->input->post('elevator');
			$params['storage'] = $this->input->post('storage');
			$params['parking'] = $this->input->post('parking');
			$params['court'] = $this->input->post('court');
			$params['dog'] = $this->input->post('dog');
			$params['cat'] = $this->input->post('cat');
			$params['dog_park'] = $this->input->post('dog_park');
			$params['trash'] = $this->input->post('trash');
			
			foreach($params as $key => $value) {
				
				if($key!='trash' && $value){
					
					$results = $this->search_model->properties($params);
					$data['results'] = $results;
					$data['title'] = 'KronoSource Search Results';
					$this->load->view('templates/header',$data);
					$this->load->view('search/properties', $data);
					$this->load->view('templates/footer', $data);
					break;
				} else {
					$this->session->set_flashdata('status','Please specify at least one search criterion.');
					redirect(base_url().'index.php/locator/searchProperties');
				}
			}
		}
	}