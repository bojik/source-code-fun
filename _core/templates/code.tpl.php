<?php $this->includeFile('_header.tpl.php')?>
<script type="text/javascript" src="/js/pages/comment.js"></script>
<h4><?php echo htmlspecialchars($row['author'])?> написал(а):</h4>
<hr>
<div class="source pre-scrollable"><pre><?php echo Source_Highlight::getHtml($row['code'], $row['lang'])?></pre></div>
<p><?php echo Source_Utils::escapeText($row['code_comment'])?></p>
<p style="text-align: right;font-weight: bold;"><?php echo Source_Utils::formatDate($row['creation_date'])?></p>
<section id="comments" <?php if ($row['comment_count'] == 0):?>style="display: none;"<?php endif?>>
<h3>Комментарии:</h3>
<table class="table" id="table-comment">
    <?php foreach ($comments as $c):?>
        <tr>
            <td width="15%" style="border-right:1px solid #DDD">
                <b><?php echo Source_Utils::escapeText($c['author'])?></b><br>
                <?php echo Source_Utils::formatDate($c['creation_date']) ?>
            </td>
            <td><?php echo Source_Utils::escapeText($c['comment'])?></td>
        </tr>
    <?php endforeach ?>
</table>
</section>
<hr>
<h3 id="new-comment">Оставить комментарий</h3>
<section>
    <form class="well" id="postComment" action="/ajax/postComment" method="POST">
        <input type="hidden" name="code_id" value="<?php echo $codeId?>">
        <div class="control-group">
            <label for="name">Ваше имя:</label>
            <input type="text" name="name" id="name" class="span11" value="<?php echo $name ?>" placeholder="Представьтесь">
            <!--span class="help-inline">Please correct the error</span-->
        </div>
        <div class="control-group">
            <label for="comment">Комментарий:</label>
            <textarea class="span11" id="comment" name="comment"  style="height:150px;"></textarea>
        </div>
        <button type="submit" class="btn">Отправить</button>
    </form>
</section>
<?php $this->includeFile('_footer.tpl.php')?>