$(function(){
    $('input.firm-filter').live('change',function(){
        var data = new Array();
        $("input.firm-filter:checked").each(function(){
            data.push($(this).val())
        }) 
        $.fn.yiiListView.update('ajaxListView', {
            type: 'GET',
            data: {
                firm: data
            },
            complete: function(jqXHR, status) {
                if (status=='success'){
                    console.log(jqXHR, status)
                }
            }
        }); 
    })
})