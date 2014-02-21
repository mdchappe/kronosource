<div class="container page-content announcement-wrapper">
<a class="btn black j-back cp-btn"><i class="icon-caret-left"></i> back to announcements</a>
<div class="inner">
	<span class="validation-errors"></span>
	<h2 class="text-center"><a class="display-ib" rel="tooltip-right" title="go to <?php echo $announcement['company']?>" href="<?php echo base_url().'index.php/locator/viewProperty/'.$announcement['id']?>"><?php echo $announcement['company']?></a></h2>
	<hr>
	<p>
		Posted: <?php echo $announcement['announcement_updated']?><br/><br/>
		<?php echo $announcement['announcement']?>
	</p>
</div></div>