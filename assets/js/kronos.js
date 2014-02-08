var lease_term_count = 1;

$(document).ready(function(){
	$('.dynamic-subject a.new').find('i').removeClass('icon-comment-alt').addClass('icon-comment');	
	
	$('a.j-back').click(function(){
        parent.history.back();
        return false;
    });

	$('#unit_date').datepicker();
	$('.date_input').datepicker();
	$('#add_term').click(add_lease_term);
	$('#random').click(generate_random);
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

function generate_random(){
	
	var characters="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
	var random_string = "";
	
	while(random_string.length < 8){
		random_string += characters[ Math.floor(Math.random()*characters.length) ];
	}
	
	$('#code').attr('value',random_string);
}
