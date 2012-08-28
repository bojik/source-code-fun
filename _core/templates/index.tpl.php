<?php
$menu = array (
    array ('all', 'Все'),
    array ('php', 'PHP'),
    array ('javascript', 'JavaScript')
);
?>
<?php $this->includeFile('_header.tpl.php')?>
<header id="overview" class="jumbotron subhead">
    <div class="subnav subnav-fixed">
        <ul class="nav nav-pills">
            <?php foreach ($menu as $item): ?>
                <li <?php echo $item[0] == $lang ? 'class="active"' : '' ?>><a href="/l/<?php echo $item[0] ?>/1"><?php echo $item[1]?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</header>
<table class="table">
<?php foreach ($rows as $row):?>
    <tr>
        <td>
            <p><b><?php echo htmlspecialchars($row['author'])?></b> <?php echo Source_Utils::formatDate($row['creation_date'])?></p>
            <div class="source pre-scrollable"><pre><?php echo Source_Highlight::getHtml($row['code'], $row['lang'])?></pre></div>
            <p><?php echo Source_Utils::escapeText($row['code_comment'])?></p>
            <p style="text-align: right;"><a href="/code/<?php echo $row['code_id']?>#new-comment">Оставить комментарий</a>&nbsp; - &nbsp;<a href="/code/<?php echo $row['code_id']?>#comments">Комментарии: <?php echo $row['comment_count']?></a></p>
        </td>
    </tr>
<?php endforeach?>
</table>
<?php echo $pages?>
<?php $this->includeFile('_footer.tpl.php')?>