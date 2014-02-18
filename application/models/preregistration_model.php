<?php 
	class Preregistration_model extends CI_Model {
		
		public function __construct() {
			
			$this->load->database();
		}
		
		public function check_registration_code($code) {
			
			$query = $this->db->get_where('registration_codes', array('code' => $code));
			return $query->row_array();
		}
		
		public function disable_registration_code($code) {
			
			$data = array('active' => 0);
			
			$this->db->where('code',$code);
			$this->db->update('registration_codes',$data);
		}
	}