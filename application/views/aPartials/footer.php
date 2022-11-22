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
            <a href="<?php echo base_url();?>admin/logout" class="btn btn-danger">Yes</a>
            <a data-dismiss="modal" class="btn btn-warning">No</a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script type="text/javascript" src="<?= base_url(); ?>resources/data-table/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/data-table/data-table-act.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/jquery_validation/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/jquery_validation/dist/additional-methods.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/dynamic_form.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/datepicker-active.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/knob/jquery.knob.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/knob/jquery.appear.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/knob/knob-active.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/print.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/s_conditions.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/s_validations.js"></script>
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

        function GoBack(){
            history.back();
        }

        function showPword(){
            var input = document.getElementById("pword1");
            if(input.type == "password"){
                input.type = "text";
            }else{
                input.type = "password";
            }
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

        $(document).ready(function(){
            $('.dropify').dropify({
                messages:{
                    'default': 'Drag and drop a image here or click to browse',
                    'replace': 'Drag and drop a image here or click to replace'
                }
            });
        });

        function showUpdateInfo(id){
            $("#updateInfo").modal("show");
            $('#id_data').attr('href','<?= base_url(); ?>admin/members/edit/identifying_data/'+id);
            $('#educ').attr('href', '<?= base_url(); ?>admin/members/edit/education/'+id);
            $('#siblings').attr('href', '<?= base_url(); ?>admin/members/view/siblings/'+id);
            $('#skills').attr('href', '<?= base_url(); ?>admin/members/edit/special_skills/'+id);
            $('#interest').attr('href', '<?= base_url(); ?>admin/members/edit/interest_hobbies/'+id);
            $('#work').attr('href', '<?= base_url(); ?>admin/members/view/work_experience/'+id);
            $('#org').attr('href', '<?= base_url(); ?>admin/members/view/member_organization/'+id);
        }

        function deleteSibling(id){
            $('#delSibling').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>admin/members/delete/sibling/'+id);
        }   

        function deleteWork(id){
            $('#delWork').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>admin/members/delete/work_experience/'+id);
        }   

         function deleteOrg(id){
            $('#delOrg').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>admin/members/delete/member_organization/'+id);
        }   

        function deleteMember(id){
            $('#delMember').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>admin/members/delete/member/'+id);
        }

        function deleteAccount(id){
            $('#delAccount').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>admin/accounts/delete/'+id);
        }

        function deleteInquiry(id){
            $('#delInquiry').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>admin/inquiries/delete/'+id);
        }

        function deleteAnnouncement(id){
            $('#delAnnouncement').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>admin/announcements/delete/'+id);
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

        $('#cPForm').validate();
        $('#id_data').validate();
        $('#education').validate();
        $('#work').validate();
        $('#organization').validate();
        $('#anForm').validate();
        $('#inqForm').validate();
        $('#searchForm').validate({
            rules: {
                searchbox:{required: true},
            },
            messages: {
                searchbox:{required:'Please enter a keyword'},
            }
        });
        $('#acForm').validate({
            rules: {
                pword2:{equalTo:"#pword1"}
            },
            messages: {
                pword2:{equalTo:'Confirm password does not match the password'}
            }
        });

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
        $('#sig1').validate();
        $('#sig2 ').validate();

        $('#sContacts').validate();

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
