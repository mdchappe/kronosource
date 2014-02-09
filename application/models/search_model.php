<?php 
	class Search_model extends CI_Model {
		
		public function __construct() {
			
			$this->load->database();
		}
		
		public function properties($params){
		
			$criteria = array();
				
			foreach($params as $key => $value){
				
				if($value && $value != 'any') {
					$criteria[$key] = $value;
				}
			}
						
			$query = $this->db->select('users.company, users.file_name, users.street, users.city, users.state, users.zip, property.*')->from('property')->like($criteria)->join('users','property.property_id = users.id')->order_by('users.company','asc')->get();
			
			return $query->result_array();
		}
		
		public function units($params) {
			
			$this->db->select('unit.*, users.company, users.street, users.city, users.state, users.zip');
			$this->db->from('unit');
			$this->db->where('unit.beds >=',$params['beds_min']);
			$this->db->where('unit.beds <=',$params['beds_max']);
			$this->db->where('unit.baths >=',$params['baths_min']);
			$this->db->where('unit.baths <=',$params['baths_max']);
			$this->db->where('unit.size >=',$params['size_min']);
			
			if($params['floor']){
				echo 'floor: '.$params['floor'];
				$this->db->where('unit.floor',$params['floor']);
			}
			
			if(strlen($params['direction']) == 1){
			echo 'direction: '.$params['direction'];
				$this->db->where('unit.direction',$params['direction']);
			}
			
			if($params['washer']!='any'){
			echo 'washer: '.$params['washer'];
				$this->db->where('unit.washer',$params['washer']);
			}
			
			if($params['unit_date']){
				echo 'date';
				$this->db->where('unit.date_available >=',$params['unit_date']);
			}
			
			$this->db->where('rent.rent >=',$params['rent_min']);
			$this->db->where('rent.rent <=',$params['rent_max']);
			$this->db->where('rent.term >=',$params['term_min']);
			$this->db->where('rent.term <=',$params['term_max']);
			
			$this->db->join('users','unit.property_id = users.id');
			$this->db->join('rent','unit.id = rent.unit_id', 'left');
			$this->db->group_by('id');
			$this->db->order_by('unit.name', 'asc');
			$query = $this->db->get();
			
			return $query->result_array();
		}
		
		
	}		