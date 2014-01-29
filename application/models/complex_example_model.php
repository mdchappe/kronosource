<?php 
	class Complex_example_model extends CI_Model {
		
		public function __construct() {
			
			$this->load->database();
		}
		
		public function get_complex_example($id = FALSE) {
			
			if($id === FALSE) {
				
				$query = $this->db->get('complex_example');
				return $query->result_array();
			}
			
			$query = $this->db->get_where('complex_example', array('id' => $id));
			return $query->row_array();
		}
		
		public function add_complex() {
			
			$data = array(
						'name' => $this->input->post('name'),
						'address' => $this->input->post('address'),
						'description' => $this->input->post('description')
			);
			
			return $this->db->insert('complex_example',$data);
		}
		
		public function edit_complex($id = FALSE) {
			
			$data = array(
						'name' => $this->input->post('name'),
						'address' => $this->input->post('address'),
						'description' => $this->input->post('description')
			);
			
			$this->db->where('id',$id);
			return $this->db->update('complex_example',$data);
		}
	}