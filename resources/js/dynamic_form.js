var count = 1;

function removeRow(){
    var bid = $('.remove').data('id');
    $("#row1"+bid).remove();
    $("#row2"+bid).remove();
    $("#row3"+bid).remove();
}

$('#addSonDaughter').on('click', function(){
    count++;
    var html_code = '<tr id="row1'+count+'"><td style="border:none;"><button type="button" data-id="'+count+'" class="btn btn-danger btn-xs remove" onclick="removeRow()"><span class="ti-close"></span></button></td></tr>';
        html_code += '<tr id="row2'+count+'">';
        html_code += '<td style="border:none;" class="inp"><label>Name</label><input type="text" name="childName[]" class="form-control" placeholder="Enter Name" maxlength="60" required/></td>';
        html_code += '<td style="border:none;" class="inp"><label>Sex</label><select name="childSex[]" class="form-control" required><option value="">Select Sex</option><option value="Male">Male</option><option value="Female">Female</option></select></td>';
        html_code += '<td style="border:none;" class="inp"><label>Age</label><input type="number" name="childAge[]" class="form-control" placeholder="Enter Age" minlength="1" required/></td>';
        html_code += '</tr>';
    $('table#sonDaughterTable').append(html_code);
});

$('#addSiblings').on('click', function(){
    count++;
    var html_code = '<tr id="row1'+count+'"><td style="border:none;"><button type="button" data-id="'+count+'" class="btn btn-danger btn-xs remove" onclick="removeRow()"><span class="ti-close"></span></button></td></tr>';
        html_code += '<tr id="row2'+count+'">';
        html_code += '<td style="border:none;" class="inp" colspan="2"><label>Name</label><input type="text" id="sibName'+count+'" name="sibName[]" class="form-control" placeholder="Enter Name" maxlength="60" required/></td>';
        html_code += '<td style="border:none;" class="inp"><label>Sex</label><select id="sibSex'+count+'" name="sibSex[]" class="form-control" required><option value=""></option><option value="Male">Male</option><option value="Female">Female</option></select></td>';
        html_code += '<td style="border:none;" class="inp"><label>Age</label><input type="number" id="sibAge'+count+'" name="sibAge[]" class="form-control" placeholder="Age" maxlength="2" required/></td>';
        html_code += '<td style="border:none;" class="inp"><label>Occupation</label><input type="text" id="sibOccup'+count+'" name="sibOccup[]" class="form-control" placeholder="Enter Occupation" maxlength="30" required/></td>';
        html_code += '<td style="border:none;" class="inp"><label>Grade/Year</label><input type="text" id="sibGrYr'+count+'" name="sibGrYr[]" class="form-control" placeholder="Enter Grade/Year" maxlength="30" required/></td>';
        html_code += '<td style="border:none;" class="inp"><label>ISY/OSY</label><select id="sibIOSY'+count+'" name="sibIOSY[]" class="form-control" required><option value=""></option><option value="ISY">ISY</option><option value="OSY">OSY</option></select></td>';
        html_code += '</tr>';
        $('table#siblings').append(html_code);
});

$('#addWork').on('click', function(){
    count++;
    var html_code = '<tr id="row1'+count+'"><td style="border:none;"><button type="button" data-id="'+count+'" class="btn btn-danger btn-xs remove" onclick="removeRow()"><span class="ti-close"></span></button></td></tr>';
        html_code += '<tr id="row2'+count+'">';
        html_code += '<td style="border:none;" class="inp"><label>Month & Year</label><input type="text" id="workDate'+count+'" name="workDate[]" class="form-control" placeholder="Select Date" required></td>';
        html_code += '<td style="border:none;" class="inp"><label>Job Title</label><input type="text" id="jobTitle'+count+'" name="jobTitle[]" class="form-control" placeholder="Enter Job Title" maxlength="40" required></td>';
        html_code += '<td style="border:none;" class="inp"><label>Monthly Income</label><input type="number" id="monIncome'+count+'" name="monIncome[]" class="form-control" placeholder="Enter Monthly Income" maxlength="5" required></td>';
        html_code += '<td style="border:none;" class="inp"><label>Reason for Leaving</label><input type="text" id="reLeave'+count+'" name="reLeave[]" class="form-control" placeholder="Enter Reason" maxlength="40" required></td>';
    $('table#work').append(html_code);   
    $('#workDate'+count).datepicker({
        dateFormat: 'MM yy',
        changeMonth: true,
        changeYear: true,
        minDate: '-100y',
        yearRange: '1940:+nn'
    });
});


$('#addOrg').on('click', function(){
    count++;
    var html_code = '<tr id="row1'+count+'"><td style="border:none;"><button type="button" data-id="'+count+'" class="btn btn-danger btn-xs remove" onclick="removeRow()"><span class="ti-close"></span></button></td></tr>';
        html_code += '<tr id="row2'+count+'">';
        html_code += '<td style="border:none; width:60%;" class="inp"><label>Name of Organization</label><input type="text" id="nameOrg'+count+'" name="nameOrg[]" class="form-control" placeholder="Enter Name of Organization" maxlength="60" required></td>';
        html_code += '<td style="border:none; width:25%;" class="inp"><label>Position Held</label><input type="text" id="posHeld'+count+'" name="posHeld[]" class="form-control" placeholder="Enter Position Held If Any" maxlength="40" required></td>';
        html_code += '<td style="border:none;" class="inp"><label>Year</label><input type="text" id="orgYear'+count+'" name="orgYear[]" class="form-control" placeholder="Select Year" required></td>';
    $('table#orgs').append(html_code);  
    $('#orgYear'+count).datepicker({
        dateFormat: 'yy',
        changeMonth: true,
        changeYear: true,
        minDate: '-100y',
        yearRange: '1940:+nn'
    });     
});


