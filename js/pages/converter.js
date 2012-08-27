$(function(){
    var $form = $('#formConverter'),
        $preview = $('#preview'),
        code = '';
    $('#convert').click(function(){
        var data = {
            'code': $form.find('[name=code]').val(),
            'lang': $form.find('[name=code_language]:checked').val()
        };
        $.post('/ajax/highlightCode', data, function(val){
            $preview.html(val);
            code = val;
//            $('#preview-text').val(val);
            $('.preview').show();
            $('#show-html').val('Показать html').attr('data-type', 0);
        });
    });

    $('#show-html').click(function(){
        var $self = $(this);
        if ($self.attr('data-type') == '0'){
            $self.val('Назад');
            var str = '<textarea class="span12" style="height:200px;">'+code+'</textarea>';
            $preview.html(str);
            $self.attr('data-type', 1);
        } else {
            $preview.html(code);
            $self.val('Показать html');
            $self.attr('data-type', 0);
        }

    });

});