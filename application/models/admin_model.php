<?php 
	class Admin_model extends CI_Model {
		
		public function __construct() {
			
			$this->load->database();
		}
		
		public function get_codes() {
			
			$this->db->select('*');
			$this->db->from('registration_codes');
			$this->db->where(array('active' => '1'));
			$query = $this->db->get();
			
			return $query->result_array();
		}
		
		public function deactivate_code($id) {
			
			$data = array('active' => 0);
			
			$this->db->update('registration_codes',$data, array('id' => $id));
			
			return 'The chosen registration code has been deactivated.';
		}
		
		public function add_code($code, $usertype, $expiration) {
			
			$data = array(
				'code' => $code,
				'usertype' => $usertype,
				'expiration' => $expiration
			);
			
			$this->db->set($data);
			$this->db->insert('registration_codes');
			
			return 'Registration code '.$code.' activated.';
		}
	}