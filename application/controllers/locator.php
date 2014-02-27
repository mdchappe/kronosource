<?php 
	
	class Locator extends Locator_Auth_Controller {
		
		public function __construct() {
			
			parent::__construct();
			$this->load->model('property_model');
			$this->load->model('gallery_model');
		}
		
		public function browseProperties($page = 0){
			
			$properties = $this->property_model->get_properties();
			
			$title = 'Browse Properties page '.(string)($page+1);
			
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
			
			$features['updated'] = $this->convert_date_to_human_adv($features['updated']);
			
			$data['images'] = $this->gallery_model->get_images('property', $id);
			$data['title'] = $property['company'];
			$data['property'] = $property;
			$data['features'] = $features;
			$data['units'] = $units;
			$data['status'] = $this->session->flashdata('status');
			
			$this->load->view('templates/header',$data);
			$this->load->view('locator/viewProperty',$data);
			$this->load->view('templates/footer',$data);
		}
		
		public function viewUnit($id) {
			
			$unit = $this->property_model->get_unit($id);
			$terms = $this->property_model->get_rent($id);
			
			$unit->date_available = $this->convert_date_to_human($unit->date_available);
			
			$data['images'] = $this->gallery_model->get_images('unit', $id);
			$data['title'] = $unit->name;
			$data['unit'] = $unit;
			$data['terms'] = $terms;
			$data['status'] = $this->session->flashdata('status');
			
			$this->load->view('templates/header',$data);
			$this->load->view('locator/viewUnit',$data);
			$this->load->view('templates/footer',$data);
		}
		
		public function searchProperties() {
			
			$this->load->helper('form');
			
			$date_input = array(
				'name' => 'unit_date',
				'id' => 'unit_date',
				'type' => 'text',
				'placeholder' => 'mm/dd/yyyy'
			);
			
			$direction_dropdown = array(
				'Any' => 'Any',
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
				'any' => 'Any',
				'none' => 'None',
				'connection' => 'Connection',
				'side_by_side' => 'Side By Side',
				'stacked' => 'Stacked'
			);
			
			$data['direction_dropdown'] = $direction_dropdown;
			$data['date_input'] = $date_input;
			$data['washer_dropdown'] = $washer_dropdown;
			
			$data['title'] = 'KronoSource Search';
			$data['status'] = $this->session->flashdata('status');
			
			$this->load->view('templates/header',$data);
			$this->load->view('locator/searchProperties',$data);
			$this->load->view('templates/footer',$data);
		}
		
		public function viewAnnouncement($id) {
			
			$data['title'] = 'KronoSource: View Announcement';
			
			$data['announcement'] = $this->property_model->get_announcement($id);
			
			$this->load->view('templates/header',$data);
			$this->load->view('locator/viewAnnouncement',$data);
			$this->load->view('templates/footer',$data);
		}
		
		public function viewAnnouncements() {
			
			$data['title'] = 'KronoSource: View All Announcements';
			
			$data['announcements'] = $this->property_model->get_announcements(FALSE);
			
			$this->load->view('templates/header',$data);
			$this->load->view('locator/viewAnnouncements',$data);
			$this->load->view('templates/footer',$data);
		}
		
		public function landing() {
			
			$data['title'] = 'KronoSource Locator Homepage';
			
			$data['announcements'] = $this->property_model->get_announcements();
			
			$this->load->view('templates/header',$data);
			$this->load->view('locator/viewAnnouncements',$data);
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
		
		private function convert_date_to_human_adv($date) {
			//YYYY-MM-DD HH:MM:SS AM/PM
			$this->load->helper('date');
			
			$date = unix_to_human($date);
			$now = unix_to_human(now());
			
			if(substr($now,0,10) == substr($date,0,10)){
				$date = substr($date,-8);
			} else {
			
				$year = substr($date, 0, 4);
				$month = substr($date, 5, 2);
				$day = substr($date, 8, 2);
				$date = $month.'-'.$day.'-'.$year;
			}
			
			return $date;
		}
	}