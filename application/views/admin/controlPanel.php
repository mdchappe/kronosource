<div class="home-wrapper container page-content">
	<h2 class="text-center">KronoSource Admin Control Panel</h2>
	<p><?php if(isset($status)){echo $status;}?></p>
	<ul>
		<li><a href="<?php echo base_url();?>index.php/admin/regcodes">Registration Code Administration</a></li>
		<li><a href="<?php echo base_url();?>index.php/admin/accounts">Account Administration</a></li>
		<li><a href="<?php echo base_url();?>index.php/admin/announcements">Announcement Administration</a></li>
		<li><a href="<?php echo base_url();?>index.php/admin/password">Change Password</a></li>
		<li><a href="<?php echo base_url();?>index.php/admin/new_admin">Add Admin Account</a></li>
	</ul>
</div>