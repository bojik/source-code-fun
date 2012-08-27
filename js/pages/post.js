$(function(){
    var $form = $('#postCode');
    $form.submit(function(){
        $form.submitForm(function(){
            alert('Спасибо!');
            document.location = '/';
            $form.find('[name=code]').val('');
            $form.find('[name=comment]').val('');
        });
        return false;
    });

    var $codePreviewWindow = $('#codePreviewWindow');
    $form.find('[name=code_preview]').click(function(){
        var data = {
            'code': $form.find('[name=code]').val(),
            'lang': $form.find('[name=code_language]:checked').val()
        };
        $codePreviewWindow.modal();
        $.post('/ajax/highlightCode', data, function(val){
            $codePreviewWindow.find('.modal-body').html(val);
        });
    });

});