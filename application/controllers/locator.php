<?php 
	
	class Locator extends Locator_Auth_Controller {
		
		public function __construct() {
			
			parent::__construct();
			$this->load->model('property_model');
		}
		
		public function browseProperties($page = 0){
			
			$properties = $this->property_model->get_properties();
			
			$title = 'Browse Properties page '.(string)($page++);
			
			$data['title'] = $title;
			$data['page'] = $page;
			$data['properties'] = $properties;
			
			$this->load->view('templates/header',$data);
			$this->load->view('locator/browseProperties',$data);
			$this->load->view('templates/footer',$data);
		}
		
		public function viewProperty($id) {
			
			$property = $this->property_model->get_property($id);
			$features = $this->property_model->get_features($id);
			$units = $this->property_model->get_units($id);
			
			$data['title'] = $property['company'];
			$data['property'] = $property;
			$data['features'] = $features;
			$data['units'] = $units;
			
			$this->load->view('templates/header',$data);
			$this->load->view('locator/viewProperty',$data);
			$this->load->view('templates/footer',$data);
		}
		
		public function viewUnit($id) {
			
			$unit = $this->property_model->get_unit($id);
			$terms = $this->property_model->get_rent($id);
			
			$db_date = $unit->date_available;
			$year = substr($db_date,0,4);
			$month = substr($db_date,5,2);
			$day = substr($db_date,-2);
			$unit->date_available = $month.'/'.$day.'/'.$year;
			
			$data['title'] = $unit->name;
			$data['unit'] = $unit;
			$data['terms'] = $terms;
			
			$this->load->view('templates/header',$data);
			$this->load->view('locator/viewUnit',$data);
			$this->load->view('templates/footer',$data);
		}
		
		public function searchProperties() {
			
			$this->load->helper('form');
			
			$data['title'] = 'Property Search';
			
			$this->load->view('templates/header',$data);
			$this->load->view('locator/searchProperties',$data);
			$this->load->view('templates/footer',$data);
		}
	}