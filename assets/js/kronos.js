var lease_term_count = 1;

$(document).ready(function(){
	$('#unit_date').datepicker();
	$('#add_term').click(add_lease_term);
});

function add_lease_term(){
	var fragment = '<tr>';
		fragment += '<td><input type="text" value="" name="lease_term_'+lease_term_count+'"></td>';
		fragment += '<td><input type="text" value="" name="monthly_rent_'+lease_term_count+'"></td>';
		fragment += '<td><input type="text" value="" name="deposit_'+lease_term_count+'"></td>';
		fragment += '<td><input type="text" value="" name="pet_rent_'+lease_term_count+'"></td>';
		fragment += '<td><input type="text" value="" name="pet_deposit_'+lease_term_count+'"></td>';
		fragment += '</tr>';
	
	$('#rent_information_table').append(fragment);
	$('#lease_term_count').attr('value',lease_term_count);
	lease_term_count++;
}