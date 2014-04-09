<div class="container page-content">
	<div class="edit-inner">
		<span class="validation-errors"></span>
		<h2 class="text-center">Renew Account</h2>
		<hr>
		<div class="row">
			<div class="content">
				<?php 
global $environment;
$environment = "sandbox";

require_once('PayflowNVPAPI.php');

////////
////
////  First, handle any return/responses
////

//Check if we just returned inside the iframe.  If so, store payflow response and redirect parent window with javascript.
if (isset($_POST['RESULT']) || isset($_GET['RESULT']) ) {
  $_SESSION['payflowresponse'] = array_merge($_GET, $_POST);
  echo '<script type="text/javascript">window.top.location.href = "' . script_url() .  '";</script>';
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
  exit(0);
}

/////////
////
//// Otherwise, begin hosted checkout pages flow
////
    
//Build the Secure Token request
$request = array(
  "PARTNER" => "PayPal",
  "VENDOR" => "palexanderpayflowtest",
  "USER" => "palexanderpayflowtestapionly",
  "PWD" => "demopass123", 
  "TRXTYPE" => "A",
  "AMT" => "1.00",
  "CURRENCY" => "USD",
  "CREATESECURETOKEN" => "Y",
  "SECURETOKENID" => uniqid('MySecTokenID-'), //Should be unique, never used before
  "RETURNURL" => script_url(),
  "CANCELURL" => script_url(),
  "ERRORURL" => script_url(),

// In practice you'd collect billing and shipping information with your own form,
// then request a secure token and display the payment iframe.
// --> See page 7 of https://cms.paypal.com/cms_content/US/en_US/files/developer/Embedded_Checkout_Design_Guide.pdf
// This example uses hardcoded values for simplicity.

  "BILLTOFIRSTNAME" => "John",
  "BILLTOLASTNAME" => "Doe",
  "BILLTOSTREET" => "123 Main St.",
  "BILLTOCITY" => "San Jose",
  "BILLTOSTATE" => "CA",
  "BILLTOZIP" => "95101",
  "BILLTOCOUNTRY" => "US",

  "SHIPTOFIRSTNAME" => "Jane",
  "SHIPTOLASTNAME" => "Smith",
  "SHIPTOSTREET" => "1234 Park Ave",
  "SHIPTOCITY" => "San Jose",
  "SHIPTOSTATE" => "CA",
  "SHIPTOZIP" => "95101",
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

echo '<div style="margin-left:40px; width:492px; height:567px;">'; // wrap iframe in a dashed wireframe for demo purposes
echo "  <iframe src='https://payflowlink.paypal.com?SECURETOKEN=$securetoken&SECURETOKENID=$securetokenid&MODE=$mode' width='490' height='565' border='0' frameborder='0' scrolling='no' allowtransparency='true'>\n</iframe>";
echo "</div>";

?>

				
			</div>
		</div>
	</div>
</div>
