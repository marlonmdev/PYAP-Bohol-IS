$(document).ready(function(){
    $.validator.setDefaults({
        errorClass: 'help-block',
        highlight: function(element){
        	$(element).closest('.inp').addClass('has-error');
        },
        unhighlight: function(element){
            $(element).closest('.inp').removeClass('has-error');
        },
       errorPlacement: function(error, element){
        if(element.prop('type') === 'checkbox'){
            error.insertAfter(element.parent());
        }else{
            error.insertAfter(element);
        }
    }
    });

	$('#id_data').validate({
		messages:{
			age:{minlength:"Age must be at least 15 years old"},
			celNo:{minlength:"Cellphone Number must be 11 digits", pattern:"Only numeric values are allowed"}
		}
	});
	$('#siblings').validate({
		submitHandler: function(form){
			form.submit();
		},
		ignore:[]
	});
	$('#education').validate();
	$('#work').validate({
		submitHandler: function(form){
			form.submit();
		},
		ignore:[]
	});
	$('#organization').validate({
		submitHandler: function(form){
			form.submit();
		},
		ignore:[]
	});
	$('#forgot').validate();
	$('#actForm').validate();
});