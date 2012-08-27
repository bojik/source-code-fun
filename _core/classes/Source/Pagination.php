<?php
class Source_Pagination extends Phifw_Pagination
{
    protected $_templateFile = 'blocks/pages.tpl.php';

    public function __construct($template = null)
    {
        if (!is_null($template)){
            $this->_templateFile = $template;
        }
        parent::__construct(Template::instance($this->_templateFile));
    }
}
