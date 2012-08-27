<?php $this->includeFile('_header.tpl.php')?>
<script type="text/javascript" src="/js/pages/post.js"></script>
<section>
    <form class="well" id="postCode" action="/ajax/saveCode" method="POST">
        <div class="control-group">
            <label for="name">Ваше имя:</label>
            <input type="text" name="name" id="name" class="span11" value="<?php echo $name ?>" placeholder="Представьтесь">
            <!--span class="help-inline">Please correct the error</span-->
        </div>
        <div class="control-group">
            <label for="code">Код:</label>
            <textarea class="span11" name="code" id="code" style="height:200px;"></textarea>
            <label class="checkbox inline">
                <input type="radio" name="code_language" value="text" checked="checked"> Нет такого
            </label>
            <label class="checkbox inline">
                <input type="radio" name="code_language" value="php"> PHP
            </label>
            <label class="checkbox inline">
                <input type="radio" name="code_language" value="javascript"> Javascript
            </label>
            <div class="pull-right">
                <button type="button" name="code_preview" class="btn">Предпросмотр</button>
            </div>
        </div>
        <div class="control-group">
            <label>Комментарий:</label>
            <textarea class="span11" name="comment"  style="height:150px;"></textarea>
        </div>
        <button type="submit" class="btn">Отправить</button>
    </form>
</section>
<div class="modal hide" id="codePreviewWindow" style="width:800px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Предпросмотр</h3>
    </div>
    <div class="modal-body">
        <img src="/img/loading.gif" border="0">
    </div>
</div>
<?php $this->includeFile('_footer.tpl.php')?>