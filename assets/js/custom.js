$(document).ready(function(){
    // $('#sandbox-container .input-group.date').datepicker({
    //     format: "dd/mm/yyyy",
    //     daysOfWeekDisabled: "5",
    //     daysOfWeekHighlighted: "5",
    //     calendarWeeks: true,
    //     autoclose: true,
    //     todayHighlight: true
    // });

    //For check all checkbox
    $("#checkAll").click(function () {
         $('input:checkbox').not(this).prop('checked', this.checked);
    });

    //For datepicker
    $('#datepicker').datepicker({
      format: 'mm/dd/yyyy',
      startDate: '-3d',
      showWeek: true,
      firstDay: 1,
      changeMonth: true,
      changeYear: true,
      showAnim: 'slideDown'
  });

});

    

    function availableStudent(){
        var student_id = $('#sinput_id').val();
        var result     = "<span id='status'>"+student_id+" is <strong>Available...</strong></span>";
        var error      = "<span id='error'>"+student_id+" is not <strong>Authorized!!</strong></span>";
        if(student_id != ""){
            $.post('crud/availablestudent.php',
                {student_id:student_id},
                function(data){
                    if(data){
                       $("#msg").html(result);
                       $("#issuesubmit").attr("disabled",false);
                       $('#student_id').val(data);
                    }else{
                        $("#msg").html(error);
                        $("#issuesubmit").attr("disabled",true);
                    }

                }
            );
        }else{
            $("#msg").html(error);
        }
    }

    function availableTeacher(){
        var teacher_id = $('#tinput_id').val();
        var result     = "<span id='status'>"+teacher_id+" is <strong>Available...</strong></span>";
        var error      = "<span id='error'>"+teacher_id+" is not <strong>Authorized!!</strong></span>";
        if(teacher_id != ""){
            $.post('crud/availableteacher.php',
                {teacher_id:teacher_id},
                function(data){
                    if(data){
                       $("#tmsg").html(result);
                       $("#tissuesubmit").attr("disabled",false);
                       $('#teacher_id').val(data);
                    }else{
                        $("#tmsg").html(error);
                        $("#tissuesubmit").attr("disabled",true);
                    }

                }
            );
        }else{
            $("#tmsg").html(error);
        }
    }

    
  $(document).ready(function() {
    $('.select-multi').select2();
  });