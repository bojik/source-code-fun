/*
 * {success: true, error, errors: {login: "", password: ""}}
 *
 **/
$.fn.submitForm = function(successFunc, errorFunc){
    this.each(function(){
        var $self = $(this),
            action = $self.attr('action'),
            data = $self.serialize(),
            $inputs = $self.find('input,textarea,select');
            
        $self.clearErrors();    
        $inputs.attr('disabled', 'disabled');
        $.post(action, data, function(res){
            $inputs.removeAttr('disabled');
            if (res){
                if (res.success){
                    if ($.isFunction(successFunc)){
                        successFunc(res);
                    }
                } else {
                    if (res.errors) {
                        for (var f in res.errors){
                            var $label = $self.find('label[for='+f+']'),
                                text = $label.text(),
                                $input = $self.find('[name='+f+']');
                                
                            text += '<span class="errorMessage"> ('+res.errors[f]+')</span>';
                            $label.html(text);    
                            //$label.addClass('error');
                            $input.parent().addClass('error');
                            
                        }
                    }
                    
                    if (res.error){
                        var text = '<div class="notice error"><span class="icon medium" data-icon="X"></span>'+res.error+'<a href="#close" class="icon close" data-icon="x"></a></div>';
                        $self.prepend(text);
                    }
                    
                    if ($.isFunction(errorFunc)){
                        errorFunc(res);
                    }
                }
            }
        }, 'json');    
        
    });
}

$.fn.clearErrors = function(){
    this.each(function(){
        var $self = $(this);
        $self.find('.notice').remove();
        $self.find('.error').removeClass('error');
        $self.find('.errorMessage').remove();
    });
}