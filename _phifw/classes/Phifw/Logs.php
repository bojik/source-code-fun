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
 * @version $Id: Logs.php 12 2012-01-06 10:48:12Z rav $
 */
/**
 * 
 * @category Phifw
 * @package Phifw
 * @subpackage
 */
class Phifw_Logs extends Phifw
{
    /**
     * @param mixed $o
     */
    static function write($o, $file_prefix = '')
    {
        if ($o instanceof Exception){
            $str = get_class($o).' '.$o->getMessage().' '.$o->getCode().' '.$o->getTraceAsString()."\n\n";
        } else {
            $str = $o."\n\n";
        }
        $file = LOGS_PATH.'/'.$file_prefix.date('Y-m-d').'.log';
        file_put_contents($file, date('H:i:s').' ['.$_SERVER['REMOTE_ADDR'].']: '.$str, FILE_APPEND);
    }
 
}