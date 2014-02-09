<?php 
	
	class Search extends Locator_Auth_Controller {
		
		public function __construct() {
			
			parent::__construct();
			$this->load->model('search_model');
		}
		
		public function properties() {
		
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
				
				if(($key!='trash' && $value) || ($key == 'trash' && $value != 'any')){
					
					$results = $this->search_model->properties($params);
					$data['results'] = $results;
					break;
				}
			}
			
			if(isset($data['results'])){
				
				$data['title'] = 'KronoSource Search Results';
				$this->load->view('templates/header',$data);
				$this->load->view('search/properties', $data);
				$this->load->view('templates/footer', $data);
			} else {
			
				$this->session->set_flashdata('status','Please specify at least one search criterion.');
				redirect(base_url().'index.php/locator/searchProperties');
			}
		}
		
		public function units(){
			
			$params = array();
			
			if($this->input->post('term_min')){	
				$params['term_min'] = $this->input->post('term_min');
			} else {
				$params['term_min'] = 0;
			}
			
			if($this->input->post('term_max')){	
				$params['term_max'] = $this->input->post('term_max');
			} else {
				$params['term_max'] = 1000000000;
			}
			
			if($this->input->post('rent_min')){	
				$params['rent_min'] = $this->input->post('rent_min');
			} else {
				$params['rent_min'] = 0;
			}
			
			if($this->input->post('rent_max')){	
				$params['rent_max'] = $this->input->post('rent_max');
			} else {
				$params['rent_max'] = 1000000000;
			}
			
			if($this->input->post('beds_min')){	
				$params['beds_min'] = $this->input->post('beds_min');
			} else {
				$params['beds_min'] = 0;
			}
			
			if($this->input->post('beds_max')){	
				$params['beds_max'] = $this->input->post('beds_max');
			} else {
				$params['beds_max'] = 1000000000;
			}
			
			if($this->input->post('baths_min')){	
				$params['baths_min'] = $this->input->post('baths_min');
			} else {
				$params['baths_min'] = 0;
			}
			
			if($this->input->post('baths_max')){	
				$params['baths_max'] = $this->input->post('baths_max');
			} else {
				$params['baths_max'] = 1000000000;
			}
			
			if($this->input->post('size_min')){	
				$params['size_min'] = $this->input->post('size_min');
			} else {
				$params['size_min'] = 0;
			}
			
			$params['floor'] = $this->input->post('floor');
			$params['direction'] = $this->input->post('direction');
			$params['washer'] = $this->input->post('washer');
			$params['unit_date'] = $this->input->post('unit_date');
			$params['commission'] = $this->input->post('commission');
			
			foreach($params as $key => $value) {
			
				if(($key!='direction' && $key!='washer' && $value) || (($key == 'direction' || $key == 'washer') && $value != 'any')){
				
					$results = $this->search_model->units($params);
					$data['results'] = $results;
					break;
				}
			}
			
			if(isset($data['results'])){
				
				$data['title'] = 'KronoSource Search Results';
				$this->load->view('templates/header',$data);
				$this->load->view('search/units', $data);
				$this->load->view('templates/footer', $data);
			} else {
				
				$this->session->set_flashdata('status','Please specify at least one search criterion.');
				redirect(base_url().'index.php/locator/searchProperties');
			}
		}
	}