<html>

<head>
	<title><?php echo $title ?></title>
</head>

<body>
	<h1><a href="/index.php/"><img src="http://www.frequencycreative.com/codeigniter/img/kronosourceJPEG_medium.jpg" /></a></h1>
	<?php if($this->ion_auth->logged_in()){ ?>
	<a href="/index.php/users/logout" style="position:fixed;top:10px;right:10px;">Logout</a>
	<?php } ?>