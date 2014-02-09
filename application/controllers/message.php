<?php

	class Message extends Common_Auth_Controller {
		
		public function __construct() {
			
			parent::__construct();
			$this->load->model('message_model');
		}
		
		public function inbox() {

			$this->load->helper('form');
			
			$data['title'] = 'KronoSource Messages Inbox';
			$data['messages'] = $this->message_model->get_messages($this->the_user->id);
			$data['status'] = $this->session->flashdata('status');
			
			$this->load->view('templates/header',$data);
			$this->load->view('message/inbox',$data);
			$this->load->view('templates/footer',$data);
		}
		
		public function compose() {
			
			$this->load->helper('form');
			
			$message = array();
			
			if($this->input->post('user_id')){
				
				$user = $this->message_model->get_user($this->input->post('user_id'));
				$message['from'] = $user['company'];
				$message['from_id'] = $user['id'];
			} else {
				
				$message = $this->message_model->get_message($this->input->post('message_id'));
			}
			
			//USED FROM INSTEAD OF TO IN ORDER TO ALLOW THIS FUNCTION TO HANDLE REPLIES AS WELL AS NEW MESSAGES. SAME APPLIES IN THE VIEW.
			if($this->input->post('message_id')) {
				
				$data['default_subject'] = 'Re: ' . $message['subject'];
				$data['default_message'] = PHP_EOL . PHP_EOL . 'On ' . $message['sent_on'] . ', '. $message['from'] . ' wrote:' . PHP_EOL . $message['message'];
			} else {
				$data['default_subject'] = '';
				$data['default_message'] = '';
			}
			
			$message_input = array(
					'required' => 'required',
					'name' => 'message',
					'id' => 'message',
					'rows' => '5',
					'cols' => '40',
					'value' => $data['default_message']
			);
			
			$data['title'] = 'Compose Message';
			$data['message'] = $message;
			$data['message_input'] = $message_input;
			
			$this->load->view('templates/header', $data);
			$this->load->view('message/compose', $data);
			$this->load->view('templates/footer', $data);
		}
		
		public function send() {
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('id','id','required');
			$this->form_validation->set_rules('subject','Subject','trim|required');
			$this->form_validation->set_rules('message','Message','trim|required');
			
			if($this->form_validation->run() === FALSE) {
				
			} else {
				
				$this->load->helper('date');
				
				$now = now();
				$format = '%Y-%m-%d';
				
				$from = $this->the_user->id;
				$to = $this->input->post('id');
				$subject = $this->input->post('subject');
				$message = $this->input->post('message');
				$date = mdate($format, $now);
				
				if($this->message_model->send($from, $to, $subject, $message, $date)) {
					
					redirect(base_url().'index.php/message/inbox');
				}
			}
		}
		
		public function read() {
			
			$message_id = $this->input->post('message_id');
			
			if($this->message_model->message_auth_check($message_id, $this->the_user->id)) {
				
				$message = $this->message_model->get_message($message_id);
				
				$data['message'] = $message;
				$data['title'] = $message['subject'];
				
				$this->load->view('templates/header',$data);
				$this->load->view('message/read',$data);
				$this->load->view('templates/footer',$data);
				
				$this->message_model->mark_read($message_id);
				
			} else {
				$this->session->set_flashdata('status','You have tried to access an unauthorized message.');
				redirect(base_url().'index.php/');
			}
		}
		
		public function delete() {
			
			$message_id = $this->input->post('id');
			
			if($this->message_model->delete_message($message_id)){
				
				$this->session->set_flashdata('status','Message deleted.');
				
				redirect(base_url().'index.php/message/inbox/');
			} 
		}
	}