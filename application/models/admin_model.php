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
		
		public function add_code($code, $usertype, $expiration, $acct_exp) {
			
			$new_code = array();
			$new_code['code'] = $code;
			$new_code['usertype'] = $usertype;
			$new_code['code_expiration' ]= $expiration;
			$new_code['account_expiration'] = $acct_exp;
			
			
			if($this->db->insert('registration_codes',$new_code)){
			
				return 'Registration code '.$code.' activated.';
			} else {
				return 'Registration code creation failed. Please try again. '.$this->db->last_query();
			}
		}
		
		public function get_accounts() {
			
			$this->db->select('*, groups.description, users_groups.group_id');
			$this->db->from('users');
			$this->db->join('users_groups', 'users_groups.user_id = users.id');
			$this->db->join('groups', 'users_groups.group_id = groups.id');
			$query = $this->db->get();
			
			return $query->result_array();
		}
		
		public function get_username_from_email($email) {
			
			$this->db->select('username');
			$this->db->from('users');
			$this->db->where('email',$email);
			$query = $this->db->get();
			$query = $query->row_array();
			return $query['username'];
		}
	}