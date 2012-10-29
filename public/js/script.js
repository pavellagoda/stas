$(function(){
    $('.remove-element').click(function(){
        return confirm('Вы действительно хотите удалить этот элемент?')
    })
    $('input.items-count').live('change', function(){
        $.ajax({
            url : 'ajax/setcount',
            data: {
                id:$(this).attr('item_id'),
                count:$(this).val()
            },
            success: function(data){
                $("li.cart a").html("Корзина("+data+")")
                $.fn.yiiListView.update("ajaxListView")
            }
        }
        )
    })
}
)