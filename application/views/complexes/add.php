<h2>Add a new Apartment Complex</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('complexes/add'); ?>

	<label for="name">Name</label>
	<input type="input" name="name" /><br/>
	
	<label for="address">Address</label>
	<input type="input" name="address" /><br/>
	
	<label for="description">Description</label>
	<input type="textarea" name="description" /><br/>
	
	<input type="submit" name="submit" value="Add Apartment Complex" />
	
</form>