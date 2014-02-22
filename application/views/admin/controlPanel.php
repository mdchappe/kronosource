<div class="cp-wrapper container page-content"><div class="inner">
	<span class="validation-errors"></span>
	<h2 class="text-center">KronoSource Admin Control Panel</h2>
	<hr>
	<p><?php if(isset($status)){echo $status;}?></p>
	<ul>
		<li class="cpreg"><a href="<?php echo base_url();?>index.php/admin/regcodes">registration codes<br><br><br><i class="icon-cogs icon-5x"></i></a></li>
		<li class="cpusers"><a href="<?php echo base_url();?>index.php/admin/accounts">user accounts<br><br><br><i class="icon-group icon-5x"></i></a></li>
		<li class="cpannounce"><a href="<?php echo base_url();?>index.php/admin/announcements">announcements<br><br><br><i class="icon-bullhorn icon-5x"></i></a></li>
		<li class="cppw"><a href="<?php echo base_url();?>index.php/admin/password">change password<br><br><br><i class="icon-unlock icon-5x"></i></a></li>
		<li class="cpadd"><a href="<?php echo base_url();?>index.php/admin/new_admin">add admin account<br><br><br><i class="icon-user icon-5x"></i></a></li>
		<li class="cppmt"><a target="_blank" href="http://www.paypal.com/">payment system<br><br><br><i class="icon-credit-card icon-5x"></i></a></li>
	</ul>
</div></div>