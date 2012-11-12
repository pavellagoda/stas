$(function(){
    bindClick();
    $('input.items-count').live('change', function(){
        $.ajax({
            url : 'ajax/setcount',
            dataType: "json",
            data: {
                id:$(this).attr('item_id'),
                count:$(this).val()
            },
            success: function(result){
                $("li.cart a").html("Корзина("+result.cart+")")
                $('span.total-sum').html(result.sum);
                $.fn.yiiListView.update("ajaxListView", {
                    complete: function(data,status) {
                        bindClick()
                    }
                }
                )
               
            }
        }
        )
    })
}
)

function bindClick() {
    $('.remove-element').bind('click',function(){
        return confirm('Вы действительно хотите удалить этот элемент?')
    })
}
