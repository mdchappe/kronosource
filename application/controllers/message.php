<?php

	class Message extends Common_Auth_Controller {
		
		public function __construct() {
			
			parent::__construct();
			$this->load->model('message_model');
			
			if(!$this->ion_auth->logged_in()) {
				$this->session->set_flashdata('login','You are either not logged in or are trying to access restricted content.');
				redirect(base_url().'index.php/');
			}
		}
		
		public function inbox() {

			$this->load->helper('form');
			
			$messages = $this->message_model->get_messages($this->the_user->id);
			
			foreach($messages as &$message) {
				$date = $message['sent_on'];
				$message['sent_on'] = $this->convert_date_to_human($date);
			}
			
			$data['title'] = 'KronoSource Messages Inbox';
			$data['messages'] = $messages;
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
				
				$message['sent_on'] = $this->convert_date_to_human($message['sent_on']);
				
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
					'value' => $data['default_message']
			);
			
			$data['title'] = 'Compose Message';
			$data['message'] = $message;
			$data['message_input'] = $message_input;
			$data['referring'] = $this->input->post('referring');
			
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
				
				$from = $this->the_user->id;
				$to = $this->input->post('id');
				$subject = $this->input->post('subject');
				$message = $this->input->post('message');
				$date = now();
				
				if($this->message_model->send($from, $to, $subject, $message, $date)) {
					
					$this->session->set_flashdata('status','Message sent.');
					
					$referring = $this->input->post('referring');
					
					if($referring){
						
						redirect(base_url().$this->input->post('referring').$to);
					} else {
						redirect(base_url().'index.php/message/inbox');
					}
				}
			}
		}
		
		public function read() {
			
			$message_id = $this->input->post('message_id');
			
			if($this->message_model->message_auth_check($message_id, $this->the_user->id)) {
				
				$message = $this->message_model->get_message($message_id);
				
				$message['sent_on'] = $this->convert_date_to_human($message['sent_on']);
				
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
		
		private function convert_date_to_unix($date) {
			//YYYY-MM-DD HH:MM:SS AM/PM
			$this->load->helper('date');
			
			$year = substr($date, -4);
			$month = substr($date, 0, 2);
			$day = substr($date, 3, 2);
			$date = $year.'-'.$month.'-'.$day.' 11:59:59 PM';
			
			return human_to_unix($date);
		}
		
		private function convert_date_to_human($date) {
			//YYYY-MM-DD HH:MM:SS AM/PM
			$this->load->helper('date');
			
			$date = unix_to_human($date);
			$now = unix_to_human(now());
			
			if(substr($now,0,10) == substr($date,0,10)){
				$date = substr($date,-8);
			} else {
			
				$year = substr($date, 0, 4);
				$month = substr($date, 5, 2);
				$day = substr($date, 8, 2);
				$date = $month.'-'.$day.'-'.$year;
			}
			
			return $date;
		}
	}