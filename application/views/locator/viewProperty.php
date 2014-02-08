<div class="container page-content view-property"><div class="inner">
<br>
<h2 class="text-center"><i class="icon-building"></i> <?php echo $property['company'];?></h2>
<hr>

<div class="upper">
	<h3><?php echo $features['management'];?></h3>
	<span class="last-updated"><small>
		Last updated: <?php 
		$date = substr(unix_to_human($features['updated']),0,10);
		$year = substr($date,0,4);
		$month = substr($date,5,2);
		$day = substr($date,-2);
		
		echo $month.'/'.$day.'/'.$year;?>
	</small></span>
</div>

<div class="row w-btns">
	<img src="<?php echo $property['file_name'];?>" />
	<div class="address"><?php echo $property['street'].'<br/>'.$property['city'].', '.$property['state'].' '.$property['zip'].'<br/><a href="tel:'.$property['phone'].'"><i class="icon-phone"></i> '.$property['phone'].'</a>';?></div>
		<a target="_blank" class="btn cancel gmaps" href="https://maps.google.it/maps?q=<?php echo $property['street'].' '.$property['city'].' '.$property['state'].' '.$property['zip'] ?>"><i class="icon-map-marker"></i> Google maps</a>
	<form method="post" name="message" id="message" action="<?php echo base_url();?>index.php/message/compose">
		<input type=hidden name="user_id" value="<?php echo $property['id'];?>" />
		<a class="btn pull-right" href="javascript: void()" onclick="document.getElementById('message').submit()"><i class="icon-comments-alt"></i> Send Message</a>
	</form>
</div>

<h3>Property Features:</h3>
<div class="row">
<ul class="features-list">
<?php
	 
	foreach($features as $feature => $value):
		
		if($value && $feature != 'id' && $feature != 'property_id' && $feature != 'management' && $feature != 'updated'){ ?>
	<li><i class="icon-ok"></i> <?php 
		if($feature == 'cable'){echo 'Cable Providers: ';} else if($feature == 'trash'){echo 'Trash Collection: ';}echo $value;?></li>
	<?php } 
	endforeach; ?>
</ul>
</div>
<h3>Available Units:</h3>
<div class="row units-table">
<table>
	<tr class="top-row">
		<th>Unit Name/Description</th>
		<th>Bedrooms</th>
		<th>Baths</th>
		<th>Size</th>
		<th>Date Available</th>
	</tr>
	<?php foreach($units as $unit):
		
		$db_date = $unit['date_available'];
		$year = substr($db_date,0,4);
		$month = substr($db_date,5,2);
		$day = substr($db_date,-2);
		$date = $month.'/'.$day.'/'.$year;
	?>
	<tr class="property-row">
		<td><a class="margin20l" href="<?php echo base_url();?>index.php/locator/viewUnit/<?php echo $unit['id']?>"><?php echo $unit['name'];?></a></td>
		<td><a class="text-center" href="<?php echo base_url();?>index.php/locator/viewUnit/<?php echo $unit['id']?>"><?php echo $unit['beds'];?></a></td>
		<td><a class="text-center" href="<?php echo base_url();?>index.php/locator/viewUnit/<?php echo $unit['id']?>"><?php echo $unit['baths'];?></a></td>
		<td><a class="text-center" href="<?php echo base_url();?>index.php/locator/viewUnit/<?php echo $unit['id']?>"><?php echo $unit['size'];?> sq.ft.</a></td>
		<td><a class="text-center" href="<?php echo base_url();?>index.php/locator/viewUnit/<?php echo $unit['id']?>"><?php echo $date;?></a></td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
</div></div>