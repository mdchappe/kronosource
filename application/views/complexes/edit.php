<h2>Edit <?php echo $complex['name'] ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('complexes/edit/'.$complex['id']); ?>

	<label for="name">Name</label>
	<input type="input" name="name" value="<?php echo $complex['name'] ?>"/><br/>
	
	<label for="address">Address</label>
	<input type="input" name="address" value="<?php echo $complex['address'] ?>" /><br/>
	
	<label for="description">Description</label>
	<input type="textarea" name="description" value="<?php echo $complex['description'] ?>" /><br/>
	
	<input type="submit" name="submit" value="Update Apartment Complex" />
	
</form>