$(document).ready(function(){
    $('#date').datepicker();

    $('#monthYearPicker').datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy'
    }).focus(function() {
        var thisCalendar = $(this);
        $('.ui-datepicker-calendar').detach();
        $('.ui-datepicker-close').click(function() {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            thisCalendar.datepicker('setDate', new Date(year, month, 1));
        });
    });

    if(($('.status').data('state') === 1) || ($('.status').data('state') === 4)){
        $('.status').click(function(){
            $(this)
                .removeClass('status')
                .addClass('validate');
        });
    }

    $('#refresh_page').on('click', function(){
        location.reload();
    });
});

