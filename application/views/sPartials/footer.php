    <!-- Logout Modal -->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:0px;">
          <div class="modal-header" id="modalHeaderColorDanger">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirm!</h4>
          </div>
          <div class="modal-body">
            <h4 class="text-center"><span class="ti-help-alt"></span>&nbsp; Are you sure you want to logout?</h4>
          </div>
          <div class="modal-footer">
            <a href="<?php echo base_url();?>lgu/logout" class="btn btn-danger">Yes</a>
            <a data-dismiss="modal" class="btn btn-warning">No</a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script type="text/javascript" src="<?= base_url(); ?>resources/data-table/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/data-table/data-table-act.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/datepicker-active.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/plugins/morris/raphael.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/plugins/morris/morris.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/s_conditions.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/jquery_validation/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/jquery_validation/dist/additional-methods.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/datepicker-active.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/knob/jquery.knob.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/knob/jquery.appear.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/knob/knob-active.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/s_validations.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/dynamic_form.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/print.js"></script>
    <script type="text/javascript"> 
        $(function(){
            "use strict";
            $("#spin").fadeOut(3500, function(){
                var wrap = $("#wrapper");
                wrap.removeClass('none');
                wrap.fadeIn(100);
            });
        });

        $(function(){
            $(document).tooltip();
            $('#accordion').accordion();
        });

        $(document).ready(function(){
            $('.dropify').dropify({
                messages:{
                    'default': 'Drag and drop a image here or click to browse',
                    'replace': 'Drag and drop a image here or click to replace'
                }
            });
        });

        function showPwords(){
            var input1 = document.getElementById("cpass");
            var input2 = document.getElementById("pass1");
            if(input1.type == "password" && input2.type == "password"){
                input1.type = "text";
                input2.type = "text";
            }else{
                input1.type = "password";
                input2.type = "password";
            }
        }
        
        function GoBack(){
            history.back();
        }

        window.onload = function(){
            if($('#eStat').val() == 'Out of School'){
                $('#eReason').fadeIn(500);
            }else{
                $('#eReason').hide();
            }

            if($('#sStat').val() == 'Out of School'){
                $('#sReason').fadeIn(500);
            }else{
                $('#sReason').hide();
            }

            if($('#cStat').val() == 'Out of School'){
                $('#cReason').fadeIn(500);
            }else{
                $('#cReason').hide();
            }

            if($('#repType').val() == 'Quarter') {
                $('div#quarter').fadeIn(200);    
                $('div#Qyear').fadeIn(200);    
            }else{
                $('div#quarter').hide();
                $('div#Qyear').hide();    
            } 
        }

        $('#ato').on('change', function(){
            var dateFrom = $('#afrom').val();
            var dateTo = $(this).val();
            if(dateTo < dateFrom){
                alert("Oops, Please select a date after or same as from.");
                $(this).val(dateFrom);            
            }
        });

        function showUpdateInfo(id){
            $("#updateInfo").modal("show");
            $('#id_data').attr('href','<?= base_url(); ?>lgu/members/edit/identifying_data/'+id);
            $('#educ').attr('href', '<?= base_url(); ?>lgu/members/edit/educational_background/'+id);
            $('#siblings').attr('href', '<?= base_url(); ?>lgu/members/view/siblings/'+id);
             $('#skills').attr('href', '<?= base_url(); ?>lgu/members/edit/special_skills/'+id);
            $('#interest').attr('href', '<?= base_url(); ?>lgu/members/edit/interest_hobbies/'+id);
            $('#work').attr('href', '<?= base_url(); ?>lgu/members/view/work_experience/'+id);
            $('#org').attr('href', '<?= base_url(); ?>lgu/members/view/member_organization/'+id);
        }

        function deleteMember(id){
            $('#delMember').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>lgu/members/delete/member/'+id);
        }   

        function deleteFamily(id){
            $('#delFamily').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>lgu/members/delete/family/'+id);
        } 

        function deleteSibling(id){
            $('#delSibling').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>lgu/members/delete/sibling/'+id);
        } 

        function deleteWork(id){
            $('#delWork').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>lgu/members/delete/work_experience/'+id);
        }   

         function deleteOrg(id){
            $('#delOrg').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>lgu/members/delete/member_organization/'+id);
        }    

        function deleteActivity(id){
            $('#delAct').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>lgu/activities/delete/activity/'+id);
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


        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, 'File size must be less than {0}');

        $('#changeProfile').validate();
        $('#changeAccount').validate();
        $('#changePass').validate({
            rules:{
                pass2:{equalTo:"#pass1"}
            },
            messages:{
                pass2:{equalTo:"Confirm password does not match the new password"}
            }
        });
        $('#searchForm').validate({
            rules: {
                searchbox:{required: true},
            },
            messages: {
                searchbox:{required:'Please enter a keyword'},
            }
        });
        $('#repForm').validate({
            rules: {
                repYear:{required: true},
                repQuarter:{required: true},
                repQYear:{required: true}
            },
            messages: {
                repYear:{required:'Please select a year'},
                repQuarter:{required:'Please select a quarter'},
                repQYear:{required:'Please select a year'},
            }
        });

        $('.count').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 2000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });

        jQuery(document).ready(function($) {
         
            setInterval(function() {
                updateValue();
            }, 2000);

        });

        function updateValue() {

            $('#count').html(Math.floor(Math.random() * (1000 - 1)) + 1);
            $('#count').each(function() {

                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        }
    </script>
</body>
</html>
