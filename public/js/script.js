var loader = {
    moreLink : 'a.more-results',
    loadBoxId: 'loadBox',
    busy : false,
    isBusy:function(){return this.busy;},
    show:function(id){
        if (typeof id == 'undefined')
            id = 'loader';
        
        $("#"+id).css('display', 'inline-block');
    },
    hide:function (id){
        if (typeof id == 'undefined') id = 'loader';
        $("#"+id).hide();
    },
    get:function(url, options){
        if (typeof url == 'object'){
            options = url;
            url = window.location.href;
        }
        var data = typeof options == 'undefined' ? {} : (options.data ? options.data : {});
        if (!this.isBusy()){
            this.show();
            $.post(typeof url=='undefined' ? window.location.href : url, data, this._ajaxCallback);
        }
    },
    _ajaxCallback:function(data, status){
        loader.hide();
        loader.busy = false;
        loader.afterAjax(data, status);
    },
    afterAjax:function(data, status){
        if (status == 'success'){
            if (data)
                $('#'+loader.loadBoxId).append(data);
            else loader._hideMoreButton();
        }
    },
    _hideMoreButton:function(){$(loader.moreLink).hide()}
}