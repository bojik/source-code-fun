<?php $this->includeFile('_header.tpl.php')?>
<script type="text/javascript" src="/js/pages/converter.js"></script>
<style type="text/css">
.preview{
    display: none;
}
</style>
<section>
    <form method="POST" id="formConverter">
    <div class="control-group">
        <label for="code" style="font-weight:bold;">Код:</label>
        <textarea class="span12" name="code" id="code" style="height:200px; font: normal normal 1em/1.2em monospace;"></textarea>
        <label class="checkbox inline">
            <input type="radio" name="code_language" value="text" checked="checked"> Нет такого
        </label>
        <label class="checkbox inline">
            <input type="radio" name="code_language" value="php"> PHP
        </label>
        <label class="checkbox inline">
            <input type="radio" name="code_language" value="javascript"> Javascript
        </label>
    </div>
    </form>
    <button type="button" id="convert" class="btn">Конвертировать</button>
    <input type="button" id="show-html" value="Показать html" data-type="0" class="btn preview">
</section>
<hr class="soften preview">
<section class="preview" id="preview">
</section>
<?php $this->includeFile('_footer.tpl.php')?>