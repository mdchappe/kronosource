<h2><?php echo $property['company'];?></h2>

<h3><?php echo $features['management'];?></h3>

<img src="<?php echo $property['file_name'];?>" />

<p>
	<?php echo $property['street'].'<br/>'.$property['city'].', '.$property['state'].' '.$property['zip'].'<br/>'.$property['phone'];?>
</p>

<p>
	Last updated: <?php 
	$date = substr(unix_to_human($features['updated']),0,10);
	$year = substr($date,0,4);
	$month = substr($date,5,2);
	$day = substr($date,-2);
	
	echo $month.'/'.$day.'/'.$year;?>
</p>

<form method="post" name="message" id="message" action="<?php echo base_url();?>index.php/message/compose">
	<input type=hidden name="user_id" value="<?php echo $property['id'];?>" />
	<a href="javascript: void()" onclick="document.getElementById('message').submit()">Send Message</a>
</form>

<h3>Property Features:</h3>

<ul>
<?php
	
	foreach($features as $feature => $value):
		
		if($value && $feature != 'id' && $feature != 'property_id' && $feature != ' management'){ ?>
	<li><?php 
		if($feature == 'cable'){echo 'Cable Providers: ';} else if($feature == 'trash'){echo 'Trash Collection: ';}echo $value;?></li>
	<?php } 
	endforeach; ?>
</ul>
<h3>Available Units:</h3>
<table>
	<tr>
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
	<tr>
		<td><a href="<?php echo base_url();?>index.php/locator/viewUnit/<?php echo $unit['id']?>"><?php echo $unit['name'];?></a></td>
		<td><?php echo $unit['beds'];?></td>
		<td><?php echo $unit['baths'];?></td>
		<td><?php echo $unit['size'];?> sq.ft.</td>
		<td><?php echo $date;?></td>
	</tr>
	<?php endforeach; ?>
</table>