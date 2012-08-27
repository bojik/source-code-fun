<?php
$_CFG['ROUTING'] = array (
    array ('/', 'Pages_Index'),
    array ('/l/([a-z]+)/?(\d+)?', 'Pages_Index'),
    array ('/code/(\d+)', 'Pages_Index', 'displayCode'),
    array ('/post', 'Pages_Index', 'postCode'),
    array ('/converter', 'Pages_Index', 'displayConverter'),
    array ('/ajax/saveCode', 'Pages_Ajax', 'saveCode'),
    array ('/ajax/postComment', 'Pages_Ajax', 'postComment'),
    array ('/ajax/highlightCode', 'Pages_Ajax', 'highlightCode'),
);
$_CFG['ERROR_404'] = array ( 'Pages_Error404', 'Index');
