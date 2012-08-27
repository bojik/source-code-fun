$(function(){
    var $form = $('#postComment'),
        $tableComment = $('#table-comment');
    $form.submit(function(){
        $form.submitForm(function(){
//            alert('Код будет опубликован после проверки модератором');
            $tableComment.parent().show();
            var dateStr = getDate();

            var str = '<tr style="display: none;">'+
                      '<td width="15%" style="border-right:1px solid #DDD"><b>'+escapeText($form.find('[name=name]').val())+'</b><br>'+
                      dateStr + '</td>'+
                      '<td>'+escapeText($form.find('[name=comment]').val())+'</td></tr>';

            $(str).appendTo($tableComment).show('slow');
            $form.find('[name=code]').val('');
            $form.find('[name=comment]').val('');
        });
        return false;
    });

    function getDate(){
        var date = new Date(),
            ret = formatNumber(date.getDate()) + '.' + formatNumber(date.getMonth()+1) + '.' + date.getFullYear();
        ret += ' ' + formatNumber(date.getHours()) + ':' + formatNumber(date.getMinutes());
        return ret;
    }

    function formatNumber(number){
        return number < 10 ? '0' + number : '' + number;
    }

    function escapeText(str){
        return str.replace(/\</g, '&lt;');
    }
});