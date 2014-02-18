<?php 
	class Gallery_model extends CI_Model {
		
		public function __construct() {
			
			$this->load->database();
		}
		
		public function get_images($type, $id) {
			
			$query = $this->db->select('*')->from('gallery')->where($type,$id)->get();
			
			$query = $query->result_array();
			if(count($query) == 0) {
				
				return FALSE;
			} else {
				
				return $query;
			}
		}
		
		public function add_image($filename, $type, $id, $width, $height, $php_path) {
			
			$image = array();
			
			$image['filename'] = $filename;
			$image[$type] = $id;
			$image['width'] = $width;
			$image['height'] = $height;
			$image['php_path'] = $php_path;
			
			if($this->db->insert('gallery', $image)){
			
				return TRUE;
			}
		}
		
		public function delete_image($id) {
			
			if($this->db->delete('gallery', array('id' => $id))) {
				return TRUE;
			} else {
				return FALSE;
			}
			
		}
	}