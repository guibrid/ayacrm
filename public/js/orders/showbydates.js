//Date picker
$('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
})

function ajaxCall(date){
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: getordersbydateUri,
        data: {date:date},
        success:function(data){
            $("#showOrders").html(data);
        }
    });
}

$(document).on('change', '#datepicker', function () {
    ajaxCall($(this).val());
});

$(document).ready(function() {
    ajaxCall($('#datepicker').val());
});
