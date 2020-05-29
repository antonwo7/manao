function init(){

	jQuery('#login_form, #registration_form').submit(function(event){
		
		event.preventDefault(); 
		var form = jQuery(this);
		ajaxPostForm(form, form.attr('action'), true);
		return false;
	});
	
}

function ajaxPostForm(form, url, has_data){
	var logged = false;
	var form_block = form.parents('.form-wrapper'); 
	
	var formdata = '';
	if(has_data) 
		formdata = new FormData(form[0]);
	
	jQuery.ajax({
		url: url,
		type: 'POST',
		data: formdata,
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(json) {
		
			if(json['logged']){
				if(json['logged'] == true){
					jQuery('#registration').remove();
				}
			}
			
			if(json['content']){
				form_block.html(json['content']);
				init();
			}
			
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + '\r\n' + xhr.statusText + '\r\n' + xhr.responseText);
		}
    });
}

jQuery(document).ready(function(){
	
	init();
	
});
