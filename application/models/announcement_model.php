<?php 
	class Announcement_model extends CI_Model {
		
		public function __construct() {
			
			$this->load->database();
		}
		
		public function get_announcements($type) {
			
			$now = now();
			
			$this->db->select('*');
			$this->db->from('announcement');
			if($type != 'all'){
				$this->db->where("(user = '".$type."' OR user = 'all') AND expiration >= ".$now);
			} else {
				$this->db->where('expiration >=',$now);
			}
			$this->db->order_by('expiration','asc');
			
			$query = $this->db->get();
			
			$query = $query->result_array();
			
			if(count($query) > 0) {
				
				return $query;
			} else {
				
				return FALSE;
			}
		}
		
		public function add_announcement($announcement, $type, $expiration) {
			
			$data = array(
				'announcement'=>$announcement,
				'user'=>$type,
				'expiration'=>$expiration
			);
			
			if($this->db->insert('announcement',$data)){
				return TRUE;
			} else {
				return FALSE;
			}
			
		}
		
		public function get_announcement($id) {
			
			$query = $this->db->get_where('announcement',array('id'=>$id));
			
			return $query->row_array();
		}
		
		public function update_announcement($id,$announcement, $type, $expiration) {
			
			$data = array(
				'announcement'=>$announcement,
				'user'=>$type,
				'expiration'=>$expiration
			);
			
			$this->db->where('id',$id);
			if($this->db->update('announcement',$data)){
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		public function delete_announcement($id) {
			
			$this->db->where('id',$id);
			if($this->db->delete('announcement')){
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}