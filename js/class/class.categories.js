var Categories = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
    };

    this.New = function(el){
        var div = $(el).parent().parent().find('div.jq-cont1');
        var input = div.find('input');

        div.show();
        
        input.unbind('keydown').bind('keydown', _on_keypress);
        input.val('').focus();

        $(el).hide();
        $(el).parent().find('button.jq-btn-save, button.jq-btn-cancel').show();
    };

    this.Delete = function(){

    };

    this.Edit = function(){

    };

    this.Save = function(el){
        _save(el);
    };

    this.Cancel = function(el){
        _cancel(el);
    };



    /* PRIVATE PROPERTIES
     **************************************************************************/


    /* PRIVATE METHODS
     **************************************************************************/
     var _on_keypress = function(e){
         switch(e.which){
             case 13: _save(this); break;
             case 27: _cancel(this); break;
         }
     };

     var _save = function(el){
        var parent = $(el).parent().parent();
        var divCont1 = parent.find('div.jq-cont1').hide();
        parent.find('div.jq-cont2').html(divCont1.find('input').val()).show();
        parent.find('button.jq-btn-cancel, button.jq-btn-save').hide();
        parent.find('button.jq-btn-new, button.jq-btn-edit, button.jq-btn-delete').show();
     };

     var _cancel = function(el){
        var parent = $(el).parent().parent();
        parent.find('div.jq-cont1').hide();        
        parent.find('button.jq-btn-cancel, button.jq-btn-save').hide();
        parent.find('button.jq-btn-new').show();
     };


})();
