<?php
/**
 * Phi Framework
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
 * @category Phifm
 * @copyright (c) 2011, Alexander Rodionov <web@devgu.ru>. All rights reserved.
 * @author Alexander Rodionov <web@devgu.ru>
 * @version $Id: engine.php 61 2012-02-15 20:14:16Z rav $
*/
define('CLASSES_DIR', CORE_ROOT.DIRECTORY_SEPARATOR.'classes');
define('CONFIGS_DIR', CORE_ROOT.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_configs');
define('TEMPLATES_DIR', CORE_ROOT.DIRECTORY_SEPARATOR.'templates');
define('FRAMEWORK_DIR', CORE_ROOT.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_phifw');

require FRAMEWORK_DIR.DIRECTORY_SEPARATOR.'framework.php';
Phifw_Loader::instance()->registerClassPath('', CLASSES_DIR);

$config = Config::getConfig('Routing');
$routing = $config->ROUTING;
$error404 = $config->ERROR_404;
list($page_class, $page_method, $params) = Phifw_Routing::instance()
                                            ->setRoutingTable($routing)
                                            ->set404Handler($error404[0], $error404[1])    
                                            ->getController();
$page = new $page_class();
try {
    call_user_func_array(array ($page, $page_method), $params);
} catch (Exception $e){
    $error = new Pages_Error500();
    $error->Index($e);
}