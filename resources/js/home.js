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

    $('#sendForm').validate({
        rules: {
            name:{required:true, maxlength:50},
            email:{required:true, email:true},
            msg:{required:true, maxlength:255}
        },
        messages: {
            name:{required:"Please enter your NAME", maxlength:"Maximum of 50 characters only"},
            email:{required:"Please enter your EMAIL", email:"Please enter a valid EMAIL"},
            msg:{required:"Please enter your MESSAGE", maxlength:"Maximum of 255 characters only"}
        }
    });

});






   