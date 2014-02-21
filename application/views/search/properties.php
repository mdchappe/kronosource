<div class="container page-content browse-wrap">
<a class="btn black cp-btn" href="/index.php/locator/searchProperties"><i class="icon-caret-left"></i> back to search page</a>
	<div class="browse-inner">
	<span class="validation-errors"></span>
		<h2 class="text-center">property Search Results</h2>
		<hr>
		<? if (empty($results)): ?>
			<p>Your search returned no results. <a href="<?php echo base_url();?>index.php/locator/searchProperties">Try again.</a></p>
		<? else: ?>
		<ul>
			<?php
				for ($i = 0, $count = count($results); $i < $count; $i++):
				
				$result = $results[$i];?>
				<li class="browse-listing" style="display:block; clear:both;">
					<a href="/index.php/locator/viewProperty/<?php echo $result['property_id'];?>">
						<img src="<?php echo substr_replace($result['file_name'], '_thumb', -4, 0);?>" style="width:80px;height:80px;float:left;" />
						<h4><?php echo $result['company'];?></h4>
					</a><br/>
					<?php echo $result['management']; ?><br/>
					<?php echo $result['street']; ?><br/>
					<?php echo $result['city'].", ".$result['state']." ".$result['zip']; ?>
				</li>
				
				
				<?php endfor; ?>
		</ul>
		<? endif;?>
	</div>
</div>