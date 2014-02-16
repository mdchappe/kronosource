<div class="container page-content home-wrapper"><div class="inner">
	<table>
		<h2>Recent Property Announcements</h2>
		<tr>
			<th>Property</th>
			<th>Announcement</th>
			<th>Posted</th>
		</tr>
	<?php foreach($announcements as $announcement):?>
	
		<tr>
			<td><a href="<?php echo base_url().'index.php/locator/viewProperty/'.$announcement['id']?>"><?php echo $announcement['company']?></a></td>
			<td><a href="<?php echo base_url().'index.php/locator/viewAnnouncement/'.$announcement['id'];?>"><?php echo $announcement['announcement']?></a></td>
			<td><?php echo $announcement['announcement_updated']?></td>
		</tr>
	<?php endforeach; ?>
	
	</table>
</div></div>