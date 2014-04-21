<?php
	class Payment extends Common_Auth_Controller {
		
		public function __construct(){
			
			parent::__construct();
			
		}
		
		public function renew() {
			
			$this->load->helper('form');
			
			$data['rate'] = 10;
			
			if($this->session->flashdata('status')) {
				$data['status'] = $this->session->flashdata('status');
			}
					
			$data['title'] = 'Renew KronoSource Access';
			$this->load->view('templates/header',$data);
			$this->load->view('payment/renew',$data);
			$this->load->view('templates/footer',$data);
		}
		
		public function pay() {
			
			$months = $this->input->post('months');
			$total = $months * $this->input->post('rate').'.00';
			
			$data['months'] = $months;
			$data['total'] = $total;
			
            global $environment;
			$environment = "sandbox";
			
			require_once('PayflowNVPAPI.php');
			
			////////
			////
			////  First, handle any return/responses
			////
			
			//Check if we just returned inside the iframe.  If so, store payflow response and redirect parent window with javascript.
			if (isset($_POST['RESULT']) || isset($_GET['RESULT']) ) {
			  echo '<div class="content"><div class="row">Payment successful! Redirecting ...</div></div>';
			  $_SESSION['payflowresponse'] = array_merge($_GET, $_POST);
			  echo '<script type="text/javascript">window.top.location.href = window.top.location.href+"confirm";</script>';
			  exit(0);
			}
			
			//Check whether we stored a server response.  If so, print it out.
			if(!empty($_SESSION['payflowresponse'])) {
			  $response= $_SESSION['payflowresponse'];
			  unset($_SESSION['payflowresponse']);
			
			  $success = ($response['RESULT'] == 0);
			
			  if($success) echo "<span style='font-family:sans-serif;font-weight:bold;'>Transaction approved! Thank you for your order.</span>";
			  else echo "<span style='font-family:sans-serif;'>Transaction failed! Please try again with another payment method.</span>";
			
			  echo "<pre>(server response follows)\n";
			  print_r($response);
			  echo "</pre>";
			    echo 'result 2';
			  exit(0);
			}
			
			/////////
			////
			//// Otherwise, begin hosted checkout pages flow
			////
			    
			//Build the Secure Token request
			$request = array(
			  "PARTNER" => "PayPal",
			  "VENDOR" => "kodehammertest",
			  "USER" => "kodehammertest",
			  "PWD" => "K0d3h4mm3r", 
			  "TRXTYPE" => "S",
			  "AMT" => $total,
			  "CURRENCY" => "USD",
			  "CREATESECURETOKEN" => "Y",
			  "SECURETOKENID" => uniqid('MySecTokenID-'), //Should be unique, never used before
			  "RETURNURL" => script_url(),
			  "CANCELURL" => script_url(),
			  "ERRORURL" => script_url(),
			
			  "BILLTOFIRSTNAME" => $this->input->post('first_name'),
			  "BILLTOLASTNAME" => $this->input->post('lasst_name'),
			  "BILLTOSTREET" => $this->input->post('street'),
			  "BILLTOCITY" => $this->input->post('city'),
			  "BILLTOSTATE" => $this->input->post('state'),
			  "BILLTOZIP" => $this->input->post('zip'),
			  "BILLTOCOUNTRY" => "US",
			
			  "SHIPTOFIRSTNAME" => $this->input->post('first_name'),
			  "SHIPTOLASTNAME" => $this->input->post('last_name'),
			  "SHIPTOSTREET" => $this->input->post('street'),
			  "SHIPTOCITY" => $this->input->post('city'),
			  "SHIPTOSTATE" => $this->input->post('state'),
			  "SHIPTOZIP" => $this->input->post('zip'),
			  "SHIPTOCOUNTRY" => "US",
			);
			
			//Run request and get the secure token response
			$response = run_payflow_call($request);
			
			if ($response['RESULT'] != 0) {
			  pre($response, "Payflow call failed");
			  exit(0);
			} else { 
			  $securetoken = $response['SECURETOKEN'];
			  $securetokenid = $response['SECURETOKENID'];
			}
			
			if($environment == "sandbox" || $environment == "pilot") $mode='TEST'; else $mode='LIVE';
			
			$data['paypal'] = "<div style='margin-left:40px; width:492px; height:567px;'> <iframe src='https://payflowlink.paypal.com?SECURETOKEN=". $securetoken."&SECURETOKENID=".$securetokenid."&MODE=".$mode."' width='490' height='565' border='0' frameborder='0' scrolling='no' allowtransparency='true'>\n</iframe></div>";
			
			$this->session->set_userdata('months',$months);
            
			$data['title'] = 'Renew KronoSource Access';
			$this->load->view('templates/header',$data);
			$this->load->view('payment/pay',$data);
			$this->load->view('templates/footer',$data);
		}
        
        public function payconfirm() {
            
            $months = $this->session->userdata('months');
            $this->session->unset_userdata('months');
            
            $expiration = $this->the_user->expiration;
            
            if(strtotime('+1 day', intval($expiration)) < time()){ 
                $expiration = time();
            }
            
            if($months == 1) {
                $monthString = '+1 month';
            } else {
                $monthString = '+'.$months.' months';
            }
            
            $newExpiration = strtotime($monthString,$expiration);
            
            $id = $this->the_user->id;
            $update = array('expiration' => $newExpiration);
            
            if($this->ion_auth->update($id, $update)){
            
            	$data['expiration'] = $this->convert_date_to_human($newExpiration);
            	$data['title'] = 'Account Renewal Successful';
            	
            	$this->load->view('templates/header',$data);
            	$this->load->view('payment/payconfirm',$data);
            	$this->load->view('templates/footer',$data);
            } else {
                echo 'update failed';
            }
        }
        
        private function convert_date_to_human($date) {
			//YYYY-MM-DD HH:MM:SS AM/PM
			$this->load->helper('date');
			
			$date = unix_to_human($date);
			
			$year = substr($date, 0, 4);
			$month = substr($date, 5, 2);
			$day = substr($date, 8, 2);
			$date = $month.'-'.$day.'-'.$year;
			
			return $date;
		}
	}