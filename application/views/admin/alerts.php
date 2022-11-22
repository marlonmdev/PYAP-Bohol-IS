<!--  ERROR ALERT -->              
<?php if($this->session->flashdata('error')): ?>
 <script type="text/javascript">
    swal({
        title: 'Failed',
        text: '<?php echo $this->session->flashdata('error'); ?>',
        timer: 2500,
        showConfirmButton: false,
        type: 'error'
    });
</script>
<?php endif; ?>

<!-- SUCCESS ALERT -->
<?php if($this->session->flashdata('success')): ?>
<script type="text/javascript">
    swal({
        title: 'Done',
        text: '<?php echo $this->session->flashdata('success'); ?>',
        timer: 2500,
        showConfirmButton: false,
        type: 'success'
    });
</script>
<?php endif; ?> 