<div class="container page-content announcement-wrapper"><div class="inner">
	<h2 class="text-center" >Recent Property Announcements</h2>
	<hr>
	<table>
		<tr>
			<th>Property</th>
			<th>Announcement</th>
			<th>Posted</th>
		</tr>
<?php foreach($announcements as $announcement):?>

		<tr class="announce-row">
			<td><a href="<?php echo base_url().'index.php/locator/viewProperty/'.$announcement['id']?>"><?php echo $announcement['company']?></a></td>
			<td><a href="<?php echo base_url().'index.php/locator/viewAnnouncement/'.$announcement['id'];?>"><?php echo $announcement['announcement']?></a></td>
			<td><?php echo $announcement['announcement_updated']?></td>
		</tr>
<?php endforeach; ?>

	</table>
	<a href="<?php echo base_url().'index.php/locator/viewAnnouncements';?>">vew all announcements</a>
</div></div>