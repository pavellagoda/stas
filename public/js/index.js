$(function() {
    $('input.firm-filter').live('change', function() {
        var data = new Array();
        $("input.firm-filter:checked").each(function() {
            data.push($(this).val())
        })
        $.fn.yiiListView.update('ajaxListView', {
            type: 'GET',
            data: {
                firm: data
            },
            complete: function(jqXHR, status) {
                if (status == 'success') {
                }
            }
        });
    })

    $('#searchbox form').submit(function() {
        $.fn.yiiListView.update('ajaxListView', {
            type: 'GET',
            data: {
                search: $('input#searchcondition').val()
            },
            complete: function(jqXHR, status) {
                if (status == 'success') {
                }
            }
        });
        return false;
    })
    
    $('input#searchcondition').change(function() {
         $('#searchbox form').trigger('submit');
    })
})