$(document).ready(function(){
    
    $('#sameB').click(function() {
        var brgy = $('#brgy').val();
        var mun = $("#mun").val();
        var prov = $("#prov").val();
        var region = $("#region").val();
        if($(this).is(":checked")){
            $('#bbrgy').val(brgy);
            $('#bmun').val(mun);
            $('#bprov').val(prov);
            $('#bregion').val(region);
        }else{
            $('#bbrgy').val('');
            $('#bmun').val('');
            $('#bprov').val('');
            $('#bregion').val('');
        }              
    });

    $('#sameH').click(function() {
        var brgy = $('#brgy').val();
        var mun = $("#mun").val();
        var prov = $("#prov").val();
        var region = $("#region").val();
        if($(this).is(":checked")){
            $('#hbrgy').val(brgy);
            $('#hmun').val(mun);
            $('#hprov').val(prov);
            $('#hregion').val(region);
        }else{
            $('#hbrgy').val('');
            $('#hmun').val('');
            $('#Hprov').val('');
            $('#hregion').val('');
        }              
    });

    $('#civilStat').on('change', function(){
        if($(this).val() == 'Solo Parent'){
            $('#sonDaughter').fadeIn(500);
        }else{
            $('#sonDaughter').hide();
        }
    });

    $('#eStat').on('change', function(){
        if($(this).val() == 'Out of School'){
            $('#eReason').fadeIn(500);
        }else{
            $('#eReason').hide();
        }
    });

    $('#sStat').on('change', function(){
        if($(this).val() == 'Out of School'){
            $('#sReason').fadeIn(500);
        }else{
            $('#sReason').hide();
        }
    });

    $('#cStat').on('change', function(){
        if($(this).val() == 'Out of School'){
            $('#cReason').fadeIn(500);
        }else{
            $('#cReason').hide();
        }
    });

    $('#none').click(function(){
        if($(this).is(":checked")){
            $('#agri').attr('disabled', 'true');
            $('#tech').attr('disabled', 'true');
            $('#construct').attr('disabled', 'true');
            $('#singing').attr('disabled', 'true');
            $('#dancing').attr('disabled', 'true');
            $('#carpentry').attr('disabled', 'true');
            $('#computer').attr('disabled', 'true');
            $('#drawing').attr('disabled', 'true');
            $('#dress').attr('disabled', 'true');
            $('#sports').attr('disabled', 'true');
            $('#arts').attr('disabled', 'true');
            $('#music').attr('disabled', 'true');
            $('#business').attr('disabled', 'true');
            $('#swimming').attr('disabled', 'true');
            $('#writing').attr('disabled', 'true');
        }else{
            $('#agri').removeAttr('disabled');
            $('#tech').removeAttr('disabled');
            $('#construct').removeAttr('disabled');
            $('#singing').removeAttr('disabled');
            $('#dancing').removeAttr('disabled');
            $('#carpentry').removeAttr('disabled');
            $('#computer').removeAttr('disabled');
            $('#drawing').removeAttr('disabled');
            $('#dress').removeAttr('disabled');
            $('#sports').removeAttr('disabled');
            $('#arts').removeAttr('disabled');
            $('#music').removeAttr('disabled');
            $('#business').removeAttr('disabled');
            $('#swimming').removeAttr('disabled');
            $('#writing').removeAttr('disabled');
        }
    });
  
    // AGE CALCULATOR
    $('#dob').on('change', function(){
       var bday = $(this).val();
       var today = new Date();
       var birthDate = new Date(bday);
       var age = today.getFullYear() - birthDate.getFullYear();
       var m = today.getMonth() - birthDate.getMonth();
       if(today.getMonth() < birthDate.getMonth() || (today.getMonth() == birthDate.getMonth() && today.getDate() < birthDate.getMonth())){
            age--;
       }
       $('#age').val(age);
    });

    // START ACTIVITY FORM CALCULATION
    $('#budget, #expense').on('keydown keyup', function(){
        var a = $('#budget').val();
        var b = $('#expense').val();
        var res = parseInt(a) - parseInt(b); 

        if(!isNaN(res)){
            $('#remain').val(res);
        }
    });
    // END OF ACTIVITY FORM CALCULATION

    $('#repType').on('change', function(){
        if($(this).val() == 'Annual') {
            $('div#year').fadeIn(200);    
        }else{
            $('div#year').hide();
        }
    });

    $('#repType').on('change', function(){
        if($(this).val() == 'Quarter') {
            $('div#quarter').fadeIn(200);    
            $('div#Qyear').fadeIn(200);    
        }else{
            $('div#quarter').hide();
            $('div#Qyear').hide();    
        }
    });

});

 