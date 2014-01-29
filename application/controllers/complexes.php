<?php 

	class Complexes extends CI_Controller {
		
		public function __construct() {
			
			parent::__construct();
			$this->load->model('complex_example_model');
		}
		
		public function index() {

			$data['complexes'] = $this->complex_example_model->get_complex_example();
			$data['title'] = 'Apartment Complexes';
			
			$this->load->view('templates/header',$data);
			$this->load->view('complexes/index',$data);
			$this->load->view('templates/footer',$data);
		}
		
		public function view($id) {
			
			$data['complex'] = $this->complex_example_model->get_complex_example($id);
			
			if(empty($data['complex'])) {
				
				show_404();
			}
			
			$data['title'] = $data['complex']['name'];
			
			$this->load->view('templates/header',$data);
			$this->load->view('complexes/view',$data);
			$this->load->view('templates/footer',$data);
		}
		
		public function add() {
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('address','address','required');
			$this->form_validation->set_rules('description','description','required');
			
			if ($this->form_validation->run() === FALSE){
				
				$data['title'] = 'Add a new Apartment Complex';
				
				$this->load->view('templates/header',$data);
				$this->load->view('complexes/add',$data);
				$this->load->view('templates/footer',$data);
			} else {
				
				$data['title'] = 'New Apartment Complex added!';
				$data['name'] = $this->input->post('name');
				
				$this->complex_example_model->add_complex();
				$this->load->view('complexes/success', $data);
			}
		}
		
		public function edit($id) {
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('address','address','required');
			$this->form_validation->set_rules('description','description','required');
			
			if ($id != FALSE) {
				$data['complex'] = $this->complex_example_model->get_complex_example($id);
			}
			
			if ($this->form_validation->run() === FALSE){
			
				
				
				$data['title'] = 'Edit '.$data['complex']['name'];
				
				$this->load->view('templates/header',$data);
				$this->load->view('complexes/edit',$data);
				$this->load->view('templates/footer',$data);
			} else {
				
				$this->complex_example_model->edit_complex($id);
				
				$this->view($id);
			}
		}
	}