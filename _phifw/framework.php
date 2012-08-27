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
 * @version $Id: framework.php 14 2012-01-06 10:50:26Z rav $
*/
define('PHIFW_HOME', dirname(__FILE__));
define('PHIFW_CLASSES', PHIFW_HOME.'/classes');
define('PHIFW_LIBS', PHIFW_HOME.'/libs');
define('PHIFW_CONFIGS', PHIFW_HOME.'/configs');

require_once PHIFW_CLASSES.'/Phifw.php';
require_once PHIFW_CLASSES.'/Phifw/Application.php';
Phifw_Application::instance()->init();

