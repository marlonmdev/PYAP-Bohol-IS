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
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/s_conditions.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/datepicker-active.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/jquery_validation/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/jquery_validation/dist/additional-methods.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/s_validations.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>resources/js/dynamic_form.js"></script>
    <script type="text/javascript"> 
        $(function(){
            $(document).tooltip();
        });

        $(document).ready(function(){
            $('.dropify').dropify({
                messages:{
                    'default': 'Drag and drop a image here or click to browse',
                    'replace': 'Drag and drop a image here or click to replace'
                }
            });
        });
        
        function GoBack(){
            history.back();
        }

        function showUpdateInfo(id){
            $("#updateInfo").modal("show");
            $('#identify2').attr('href','<?= base_url(); ?>lgu/members/edit/identifying_info/'+id);
            $('#edu2').attr('href', '<?= base_url(); ?>lgu/members/edit/education/'+id);
            $('#family2').attr('href', '<?= base_url(); ?>lgu/members/view/family/'+id);
            $('#train2').attr('href', '<?= base_url(); ?>lgu/members/view/training/'+id);
            $('#dreams2').attr('href', '<?= base_url(); ?>lgu/members/edit/dreams_hobbies/'+id);
            $('#reasons2').attr('href', '<?= base_url(); ?>lgu/members/edit/reasons/'+id);
        }

        function deleteMember(id){
            $('#delMember').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>lgu/members/delete/member/'+id);
        }   

        function deleteFamily(id){
            $('#delFamily').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>lgu/members/delete/family/'+id);
        } 

        function deleteTraining(id){
            $('#delTraining').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>lgu/members/delete/training/'+id);
        }   

        function deleteActivity(id){
            $('#delAct').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>lgu/activities/delete/activity/'+id);
        }

        function deleteBarangay(id){
            $('#delBarangay').modal("show");
            $('#delLink').attr('href', '<?= base_url(); ?>lgu/barangays/delete/barangay/'+id);
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

        $('#educform').validate({
            rules: {
                ename:{required:true, maxlength:50},
                eaddr:{required:true, maxlength:50},
                elevel:{required:true},
                estat:{required:true},
                efrom:{required:true},
                eto:{required:true}
            },
            messages: {
                ename:{required:'Please enter ELEMENTARY SCHOOL NAME', maxlength:'Maximum of 50 characters only'},
                eaddr:{required:'Please enter ELEMENTARY SCHOOL ADDRESS', maxlength:'Maximum of 50 characters only'},
                elevel:{required:'Please enter Elementary Grade Level'},
                estat:{required:'Please select Elementary Educational Status'},
                efrom:{required:'Please select Date for From'},
                eto:{required:'Please select Date for From'}
            }
        });

        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, 'File size must be less than {0}');

        $('#changeProfile').validate();

        $('#changeEmail').validate();

        $('#changePhone').validate();

        $('#changeUname').validate();

        $('#changePass').validate({
            rules:{
                pass2:{required:true, equalTo:"#pass1"}
            },
            messages:{
                pass2:{equalTo:"Confirm password does not match the new password"}
            }
        });

        $('#educForm').validate({
            rules: {
                ename:{required:true},
                eaddr:{required:true},
                elevel:{required:true},
                estat:{required:true}
            },
            messages: {
                ename:{required:'Please Enter Elementary School Name'},
                eaddr:{required:'Please Enter Elementary School Address'},
                elevel:{required:'Please Enter Elementary Grade Level'},
                estat:{required:'Please Select Elementary Educational Status'}
            }
        });
    </script>
</body>
</html>
