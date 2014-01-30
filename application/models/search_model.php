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
			
			/*	
			//INPUTS
			'property_name']
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
			
			$query = $this->db->select('users.company, users.file_name, users.street, users.city, users.state, users.zip, property.*')->from('property')->like($criteria)->join('users','property.property_id = users.id')->order_by('users.company','asc')->get();
			/*
$this->db->from('property');
			$this->db->where($criteria);
			$this->db->join('users','property.property_id = users.id');
			$this->db->order_by('users.company','asc');
			$query = $this->db->get();
*/
			return $query->result_array();
		}
		
		public function units($params) {
			
			
		}
	}		