<?php 
	class Message_model extends CI_Model {
		
		public function __construct() {
			
			$this->load->database();
		}
		
		public function get_user($id) {
			
			$query = $this->db->get_where('users', array('id' => $id));
			return $query->row_array();
		}
		
		public function get_unit_name($id) {
			
			$query = $this->db->get_where('unit', array('id'=>$id));
			$query = $query->row_array();
			
			return $query['name'];
		}
		
		public function send($from_id, $to_id, $subject, $message, $date) {
			
			$message_data = array();
			$traffic_data = array();
			
			$message_data['subject'] = $subject;
			$message_data['message'] = $message;
			$message_data['sent_on'] = $date;
			
			if($this->db->insert('messages',$message_data)) {
				$traffic_data['to_id'] = $to_id;
				$traffic_data['to'] = $this->db->get_where('users', array('id'=>$to_id))->row_array()['display_name'];
				$traffic_data['from_id'] = $from_id;
				$traffic_data['from'] = $this->db->get_where('users', array('id'=>$from_id))->row_array()['display_name'];
				$traffic_data['message_id'] = $this->db->insert_id();
			
				if($this->db->insert('message_traffic',$traffic_data))
				{
					return TRUE;
				} else {
					return FALSE;
				}
			}
		}
		
		public function get_messages($id) {
			
			$this->db->select('message_traffic.*, messages.subject, messages.sent_on');
			$this->db->from('message_traffic');
			$this->db->where(array('to_id'=>$id,'display'=>1));
			$this->db->join('messages','messages.id = message_traffic.message_id');
			$this->db->order_by('messages.sent_on','desc');
			
			$query = $this->db->get()->result_array();
			
			return $query;
		}
		
		public function get_message($message_id) {
			
			$this->db->select('message_traffic.*, messages.subject, messages.message, messages.sent_on');
			$this->db->from('message_traffic');
			$this->db->where('message_id',$message_id);
			$this->db->join('messages','messages.id = message_traffic.message_id');
			
			$query = $this->db->get()->row_array();
			
			return $query;
		}
		
		public function message_auth_check($message_id, $user_id) {
			
			$query = $this->db->get_where('message_traffic',array('message_id'=>$message_id))->row_array();
			
			if(($user_id = $query['to_id'] || $user_id = $query['from_id']) && $query['display'] == 1) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		public function mark_read($message_id) {
			
			$data = array('read' => 1);
			
			$this->db->where('message_id', $message_id);
			$this->db->update('message_traffic', $data);
			
			return TRUE;
		}
		
		public function mark_unread($message_id) {
			
			$data = array('read' => 0);
			
			$this->db->where('message_id', $message_id);
			$this->db->update('message_traffic', $data);
			
			return TRUE;
		}
		
		public function delete_message($message_id) {
			
			$data = array('display' => 0);
			
			$this->db->where('message_id', $message_id);
			$this->db->update('message_traffic', $data);
			
			return TRUE;
		}
		
		public function undelete_message($message_id) {
			
			$data = array('display' => 1);
			
			$this->db->where('message_id', $message_id);
			$this->db->update('message_traffic', $data);
			
			return TRUE;
		}
		
		public function count_unread($id){
			
			$data = array('to_id' => $id, 'read' => 0);
			
			$this->db->where($data);
			$this->db->from('message_traffic');
			$count = $this->db->count_all_results();
			
			return $count;
		}
}