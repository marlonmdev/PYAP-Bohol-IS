	<script type="text/javascript" src="<?php echo base_url('resources/js/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?= base_url(); ?>resources/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('resources/js/scrollreveal.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('resources/js/reveal.js');?>"></script>
	<script type="text/javascript"  src="<?= base_url('resources/jquery_validation/dist/jquery.validate.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('resources/jquery_validation/dist/additional-methods.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('resources/js/home.js'); ?>"></script>
    <script type="text/javascript">
    	function GoBack(){
			history.back();
		}	

		$(function(){
			$(document).tooltip();
		});

        $(".actTilt").tilt({
            maxTilt: 20,
            glare: true,
            transition: true,
            maxGlare: .4
        }); 

        $('#btnBack').popover('show')

		function showPword(){
			var input = document.getElementById("logPword");
			if(input.type == "password"){
				input.type = "text";
			}else{
				input.type = "password";
			}
		}
        
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
        
		$('#loginForm').validate({
            messages:{
                uname:{required:"Please enter your username."},
                pword:{required:"Please enter your password."}
            }
        });
    </script>
</body>
</html>