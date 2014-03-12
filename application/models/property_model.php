<?php 
	class Property_model extends CI_Model {
		
		public function __construct() {
			
			$this->load->database();
		}
		
		public function get_properties() {
			
			$complexes = $this->db->select('group_id, company, city, street, state, zip, users.id, users.active, file_name, property.management')->from('users_groups')->where('group_id',3)->where('users.active','1')->join('users','users_groups.user_id = users.id')->join('property','users.id = property.property_id')->order_by('company','asc')->get()->result_array();
			
			return $complexes;
		}
		
		public function get_property($id = FALSE) {
			
			if($id === FALSE) {
				
				redirect('/locator/browseProperties');
			}
			
			$query = $this->db->get_where('users', array('id' => $id));
			return $query->row_array();
		}
		
		public function get_features($id) {
			
			if($id === FALSE) {
				
				redirect('/locator/browseProperties');
			}
			
			$query = $this->db->get_where('property', array('property_id' => $id));
			return $query->row_array();
		}
		
		public function add_features($id) {
			
			$data = array();
			
			$data['management'] = $this->input->post('management');
			
			$data['fitness'] = $this->input->post('fitness');
						
			$data['clubhouse'] = $this->input->post('clubhouse');

			$data['blinds'] = $this->input->post('blinds');
			
			$data['ceilings'] = $this->input->post('ceilings');
			
			$data['pool'] = $this->input->post('pool');
			
			$data['laundry'] = $this->input->post('laundry');
			
			$data['business'] = $this->input->post('business');
			
			$data['wifi'] = $this->input->post('wifi');
			
			$data['gated'] = $this->input->post('gated');
			
			$data['fireplace'] = $this->input->post('fireplace');
			
			$data['elevator'] = $this->input->post('elevator');
			
			$data['storage'] = $this->input->post('storage');
			
			$data['parking'] = $this->input->post('parking');
			
			$data['court'] = $this->input->post('court');
			
			$data['dog'] = $this->input->post('dog');
			
			$data['cat'] = $this->input->post('cat');
			
			$data['dog_park'] = $this->input->post('dog_park');
			
			$data['cable'] = $this->input->post('cable');
			
			$data['trash'] = $this->input->post('trash');
			
			$data['pet_policy'] = $this->input->post('pet_policy');
			
			$data['additional'] = $this->input->post('additional');
			
			$data['fax'] = $this->input->post('fax');
			
			$data['hours'] = $this->input->post('hours');
			
			$data['property_id'] = $id;
			
			$data['updated'] = time();
			
			return $this->db->insert('property',$data);
		}
		
		public function update_features($id) {
			
			$data = array();
			
			$data['management'] = $this->input->post('management');
			
			$data['fitness'] = $this->input->post('fitness');
						
			$data['clubhouse'] = $this->input->post('clubhouse');

			$data['blinds'] = $this->input->post('blinds');
			
			$data['ceilings'] = $this->input->post('ceilings');
			
			$data['pool'] = $this->input->post('pool');
			
			$data['laundry'] = $this->input->post('laundry');
			
			$data['business'] = $this->input->post('business');
			
			$data['wifi'] = $this->input->post('wifi');
			
			$data['gated'] = $this->input->post('gated');
			
			$data['fireplace'] = $this->input->post('fireplace');
			
			$data['elevator'] = $this->input->post('elevator');
			
			$data['storage'] = $this->input->post('storage');
			
			$data['parking'] = $this->input->post('parking');
			
			$data['court'] = $this->input->post('court');
			
			$data['dog'] = $this->input->post('dog');
			
			$data['cat'] = $this->input->post('cat');
			
			$data['dog_park'] = $this->input->post('dog_park');
			
			$data['cable'] = $this->input->post('cable');
			
			$data['trash'] = $this->input->post('trash');
			
			$data['announcement'] = $this->input->post('announcement');
			
			$data['pet_policy'] = $this->input->post('pet_policy');
			
			$data['additional'] = $this->input->post('additional');
			
			$data['fax'] = $this->input->post('fax');
			
			$data['hours'] = $this->input->post('hours');
			
			$data['updated'] = time();
			
			if($this->session->flashdata('announcement') != $data['announcement']){
				$data['announcement_updated'] = $data['updated'];
			}
			
			$this->db->where('property_id', $id);
			$this->db->update('property',$data);
		}
		
		function get_units($id) {
			
			$query = $this->db->get_where('unit',array('property_id' => $id));
			return $query->result_array();
		}
		
		function add_unit($id) {
			//INITIALIZE ARRAYS
			$unit_data = array();
			$rent_data = array();
			
			//GET THE ENTERED DATE AND REFORMAT FOR DB
			$available_date = $this->convert_date_to_unix($this->input->post('unit_date'));
			
			//PUSH UNIT DATA FROM FORM INTO ARRAY
			$unit_data['property_id'] = $id;
			$unit_data['name'] = $this->input->post('unit_name');
			$unit_data['beds'] = $this->input->post('unit_beds');
			$unit_data['baths'] = $this->input->post('unit_baths');
			$unit_data['size'] = $this->input->post('unit_size');
			$unit_data['floor'] = $this->input->post('unit_floor');
			$unit_data['direction'] = $this->input->post('unit_direction');
			$unit_data['washer'] = $this->input->post('unit_washer');
			$unit_data['furnished'] = $this->input->post('unit_furnished');
			$unit_data['requirements'] = $this->input->post('unit_requirements');
			$unit_data['specials'] = $this->input->post('unit_specials');
			$unit_data['commission'] = $this->input->post('unit_commission');
			$unit_data['date_available'] = $available_date;
			//INSERT UNIT DATA INTO DB
			$this->db->insert('unit',$unit_data);
			
			//GET UNIT ID
			$unit_id = $this->db->insert_id();
			//GET NUMBER OF LEASE TERMS LISTED
			$rent_count = $this->input->post('lease_term_count');
			
			if($rent_count > 0) {
				
				$term = 0;
				//PUSH ENTRY TO DB FOR EVERY TERM LISTED
				while($term <= $rent_count) {
					
					$rent_data['unit_id'] = $unit_id;
					$rent_data['term'] = $this->input->post('lease_term_'.$term);
					$rent_data['rent'] = $this->input->post('monthly_rent_'.$term);
					$rent_data['deposit'] = $this->input->post('deposit_'.$term);
					//$rent_data['pet_rent'] = $this->input->post('pet_rent_'.$term);
					//$rent_data['pet_deposit'] = $this->input->post('pet_deposit_'.$term);
					$this->db->insert('rent',$rent_data);
					$rent_data = array();
					$term++;
				}
				
			} else {
				//PUSH LEASE TERM DATA TO DB
				$rent_data['unit_id'] = $unit_id;
				$rent_data['term'] = $this->input->post('lease_term_0');
				$rent_data['rent'] = $this->input->post('monthly_rent_0');
				$rent_data['deposit'] = $this->input->post('deposit_0');
				//$rent_data['pet_rent'] = $this->input->post('pet_rent_0');
				//$rent_data['pet_deposit'] = $this->input->post('pet_deposit_0');
				$this->db->insert('rent',$rent_data);
			}
			
			return TRUE;
		}
		
		function update_unit($id) {
			
			//INITIALIZE ARRAYS
			$unit_data = array();
			
			//GET THE ENTERED DATE AND REFORMAT FOR DB
			$available_date = $this->convert_date_to_unix($this->input->post('unit_date'));
			
			//PUSH UNIT DATA FROM FORM INTO ARRAY
			
			$unit_data['name'] = $this->input->post('unit_name');
			$unit_data['beds'] = $this->input->post('unit_beds');
			$unit_data['baths'] = $this->input->post('unit_baths');
			$unit_data['size'] = $this->input->post('unit_size');
			$unit_data['floor'] = $this->input->post('unit_floor');
			$unit_data['direction'] = $this->input->post('unit_direction');
			$unit_data['washer'] = $this->input->post('unit_washer');
			$unit_data['furnished'] = $this->input->post('unit_furnished');
			$unit_data['requirements'] = $this->input->post('unit_requirements');
			$unit_data['specials'] = $this->input->post('unit_specials');
			$unit_data['commission'] = $this->input->post('unit_commission');
			$unit_data['date_available'] = $available_date;

			$this->db->where('id', $id);
			$this->db->update('unit',$unit_data);
			
			return TRUE;
		}
		
		function update_lease_term($id) {
			$rent_data = array();
			//PUSH LEASE TERM DATA TO DB
			$rent_data['term'] = $this->input->post('lease_term');
			$rent_data['rent'] = $this->input->post('monthly_rent');
			$rent_data['deposit'] = $this->input->post('deposit');
			//$rent_data['pet_rent'] = $this->input->post('pet_rent');
			//$rent_data['pet_deposit'] = $this->input->post('pet_deposit');
			$this->db->where('id',$id);
			$this->db->update('rent',$rent_data);
			
			return TRUE;
		}
		
		function get_lease_term($id) {
			
			$query = $this->db->get_where('rent',array('id'=>$id));
			return $query->row_array();
		}
		
		function check_unit_owner($id) {
			
			$this->db->select('property_id');
			
			$query = $this->db->get_where('unit',array('id'=>$id));
			
			return $query->row_array();
		}
		
		function check_lease_owner($id) {
			
			$this->db->select('unit_id');
			
			$query = $this->db->get_where('rent',array('id'=>$id));
			
			$unit_id =  $query->row_array()['unit_id'];
			
			$this->db->select('property_id, id');
			
			$query2 = $this->db->get_where('unit',array('id'=>$unit_id));
			
			return $query2->row_array();
		}
		
		public function get_unit($id) {
			
			$query = $this->db->get_where('unit',array('id'=>$id));
			return $query->row();
		}
		
		public function get_rent($id) {
			
			$query = $this->db->select('*')->from('rent')->where('unit_id',$id)->order_by('term','asc')->get();
			return $query->result_array();
		}
		
		private function build_features_array($id) {
			$data = array();
			
			if($this->input->post('fitness')){
				$data['fitness'] = 1;
			} else {
				$data['fitness'] = 0;
			}
			
			if($this->input->post('clubhouse')){
				$data['clubhouse'] = 1;
			} else {
				$data['clubhouse'] = 0;
			}
			
			if($this->input->post('blinds')){
				$data['blinds'] = 1;
			} else {
				$data['blinds'] = 0;
			}
			
			if($this->input->post('ceilings')){
				$data['ceilings'] = 1;
			} else {
				$data['ceilings'] = 0;
			}
			
			if($this->input->post('pool')){
				$data['pool'] = 1;
			} else {
				$data['pool'] = 0;
			}
			
			if($this->input->post('laundry')){
				$data['laundry'] = 1;
			} else {
				$data['laundry'] = 0;
			}
			
			if($this->input->post('business')){
				$data['business'] = 1;
			} else {
				$data['business'] = 0;
			}
			
			if($this->input->post('wifi')){
				$data['wifi'] = 1;
			} else {
				$data['wifi'] = 0;
			}
			
			if($this->input->post('gated')){
				$data['gated'] = 1;
			} else {
				$data['gated'] = 0;
			}
			
			if($this->input->post('fireplace')){
				$data['fireplace'] = 1;
			} else {
				$data['fireplace'] = 0;
			}
			
			if($this->input->post('elevator')){
				$data['elevator'] = 1;
			} else {
				$data['elevator'] = 0;
			}
			
			if($this->input->post('storage')){
				$data['storage'] = 1;
			} else {
				$data['storage'] = 0;
			}
			
			if($this->input->post('parking')){
				$data['parking'] = 1;
			} else {
				$data['parking'] = 0;
			}
			
			if($this->input->post('court')){
				$data['court'] = 1;
			} else {
				$data['court'] = 0;
			}
			
			if($this->input->post('dog')){
				$data['dog'] = 1;
			} else {
				$data['dog'] = 0;
			}
			
			if($this->input->post('cat')){
				$data['cat'] = 1;
			} else {
				$data['cat'] = 0;
			}
			
			if($this->input->post('dog_park')){
				$data['dog_park'] = 1;
			} else {
				$data['dog_park'] = 0;
			}
			
			$data['cable'] = $this->input->post('cable');
			
			$data['trash'] = $this->input->post('trash');
			
			$data['property_id'] = $id;
			
			return $data;
		}
		
		public function delete_unit($id) {
			
			$this->db->delete('rent',array('unit_id'=>$id));
			$this->db->delete('unit',array('id'=>$id));
			
			return TRUE;
		}
		
		public function delete_lease_term($id) {
			
			$this->db->delete('rent',array('id'=>$id));
			
			return TRUE;
		}
		
		public function add_lease_term($params) {
			
			$this->db->insert('rent',$params);
		}
		
		public function get_announcements($limit = TRUE) {
			
			$this->db->select('users.company,users.id,property.announcement,property.announcement_updated');
			$this->db->from('property');
			$this->db->where('announcement IS NOT NULL');
			$this->db->join('users','users.id = property.property_id');
			$this->db->order_by('announcement_updated','desc');
			if($limit){
				$this->db->limit(10);
			}
			
			$query = $this->db->get();
			
			$query = $query->result_array();
			
			foreach($query as &$row){
				$row['announcement_updated'] = $this->convert_date_to_human_specific($row['announcement_updated']);
				
				if(strlen($row['announcement']) > 47){
					$row['announcement'] = substr($row['announcement'], 0,50).'...';
				}
			}
			
			return $query;
		}
		
		public function get_announcement($id){
			
			$this->db->select('users.company,users.id,property.announcement,property.announcement_updated');
			$this->db->from('property');
			$this->db->where('property_id',$id);
			$this->db->join('users','users.id = property.property_id');
			
			$query = $this->db->get();
			
			$query = $query->row_array();
			
			$query['announcement_updated'] = $this->convert_date_to_human_specific($query['announcement_updated']);
			
			return $query;
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
		
		private function convert_date_to_human_specific($date) {
			//YYYY-MM-DD HH:MM:SS AM/PM
			
			$this->load->helper('date');
			
			$date = unix_to_human($date);
			$now = unix_to_human(now());
			
			if(substr($now,0,10) == substr($date,0,10)){
				$date = substr($date,-8);
				if($date[0] != '1') {
					$date = substr($date, -7);
				}
			} else {
			
				$year = substr($date, 0, 4);
				$month = substr($date, 5, 2);
				$day = substr($date, 8, 2);
				$date = $month.'-'.$day.'-'.$year;
			}
			return $date;
		}
	}