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
			
			/* 	term_min _max
				rent_min _max
				beds_min _max
				baths_min _max
				size_min
				floor
				direction
				washer
				unit_date
				commission */
				
			$criteria = array();
			
			$criteria['commission'] = $params['commission'];
			
				
			$this->db->select('unit.*, users.company, users.city, users.state');
			$this->db->from('unit');
			/*complicated databasey stuff*/
			$this->db->like($criteria);
			$this->db->join('users','unit.property_id = users.id');
			$this->db->order_by('unit.name', 'asc');
			$query = $this->db->get();
			
			$query->result_array();
		}
		
		
	}		