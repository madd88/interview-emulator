/**
 * Created by NiL on 13.02.2019.
 */


function saveQuestionLevel(formID) {

    var data = $('#' + formID).serialize();

    $.ajax({
        type: 'POST',
        url: '/ajax/generateQuestionLevel',
        data: data,
        dataType: 'json',
        success: function (data) {
            if(data.success){
                $('#question_level_modal').modal('hide');
            }
            alert(data.message);
        }
    });
}

function getTestResult(formID) {

    var data = $('#testForm').serialize();

    $.ajax({
        type: 'POST',
        url: '/ajax/getTestResult',
        data: data,
        dataType: 'json',
        success: function (data) {
            var spl = data.splice(0, 1);
            $("#results_num").html(spl + ' из 40');

            $('#test_results').DataTable().destroy();
            $('#test_results').DataTable( {
                data: data,
            } );
        }
    });
}


$( document ).ready(function() {
    $("#range_level").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 100,
        from: 0,
        to: 100,
        step: 1
    });
});

