<?php
/**
 * Phifw
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * @category Phifw
 * @copyright (c) 2011, Alexander Rodionov <web@devgu.ru>. All rights reserved.
 * @author Alexander Rodionov <web@devgu.ru>
 * @version $Id: Loader.php 12 2012-01-06 10:48:12Z rav $
 */
/**
 * Class file loader
 *
 * @category Phifw
 * @package Phifw
 * @subpackage Pagination
 */
class Phifw_Pagination
{
    /**
     * @var Phifw_Template
     */
    protected $_templateEngine;
    protected $_totalDisplayedLinks;

    /**
     * @param Phifw_Template $templateEngine
     */
    public function __construct(Phifw_Template $templateEngine)
    {
        $this->_templateEngine = $templateEngine;
    }

    /**
     * @param integer $activePage
     * @param integer $totalPages
     * @param string $urlTemplate
     * @return string
     */
    public function getHtml($activePage, $totalPages, $urlTemplate)
    {
        $pages = $this->_getPagesArray($activePage, $totalPages, $urlTemplate);
        $prev = $next = '';

        if ($activePage < $totalPages) {
            $next = sprintf($urlTemplate, $activePage + 1);
        }

        if ($activePage > 1) {
            $prev = sprintf($urlTemplate, $activePage + 1);
        }

        return $this->_templateEngine
            ->setParam('pages', $pages)
            ->setParam('prev', $prev)
            ->setParam('next', $next)
            ->fetch();
    }

    protected function _getPagesArray($activePage, $totalPages, $urlTemplate)
    {
        $ret = array();
        for ($i = 1; $i <= $totalPages; $i++) {
            $ret[] = array(
                'number' => $i,
                'active' => $i == $activePage,
                'url' => sprintf($urlTemplate, $i)
            );
        }
        return $ret;
    }

    /**
     * @param integer $totalDisplayedLinks
     * @return Phifw_Pagination
     */
    public function setTotalDisplayedLinks($totalDisplayedLinks)
    {
        $this->_totalDisplayedLinks = $totalDisplayedLinks;
        return $this;
    }

}