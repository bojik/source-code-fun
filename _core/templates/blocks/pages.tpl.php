<?php if (count($pages) > 1): ?>
<div class="pagination pagination-centered">
    <ul>
        <li <?php echo empty ($prev) ? 'class="disabled"' : ''?>><a href="<?php echo $prev?>">&larr; Предыдущий</a></li>
<?php foreach ($pages as $page):?>
        <li <?php echo $page['active'] ? 'class="active"' : ''?>>
            <a href="<?php echo $page['url']?>"><?php echo $page['number']?></a>
        </li>
<?php endforeach ?>
        <li <?php echo empty ($next) ? 'class="disabled"' : ''?>><a href="<?php echo $next?>">Следующий &rarr;</a></li>
    </ul>
</div>
<?php endif ?>