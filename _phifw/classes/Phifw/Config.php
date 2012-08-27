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
 * @version $Id: Config.php 12 2012-01-06 10:48:12Z rav $
 */
/**
 * Loads and work with config files
 * @category Phifw
 * @package Phifw
 */
class Phifw_Config extends Phifw
{
    static private $aConfigs = array ();
    private $aStrings = array ();
    private $sFileName;

    protected function __construct()
    {

    }
/**
* @param string $file_name
* @return Config
*/
    static function getConfig($file_name, $class = null)
    {
        //var_dump($file_name);
        if (!isset(self::$aConfigs[$file_name])){
            if (is_null($class)){
                $a = new self();
            } else {
                $a = new $class;    
            }
            $a->sFileName = $file_name;
            $a->loadConfigInfo();
            self::$aConfigs[$file_name] = $a;
        }
        return self::$aConfigs[$file_name];
    }


    protected function loadConfigInfo()
    {
        $file = $this->getConfigPath().DIRECTORY_SEPARATOR.$this->sFileName.'.cfg.php';
        if (!file_exists($file)){
            throw new Exception("Config file '".$file."' not found");
        }
        include $file;
        $this->aStrings = $_CFG;
    }
    
    protected function getConfigPath()
    {
        return PHIFW_CONFIGS;
    }

    /**
* @return mixed
*/
    public function getStrings()
    {

        $index = func_get_args();
        if (count($index) == 0){
            return $this->aStrings;
        }

        $a = $this->aStrings;
        for ($i = 0; $i < count($index); $i++){
            if (!isset ($a[$index[$i]])){
                return null;
            }
            $a = $a[$index[$i]];
        }
        return $a;
    }

    public function __get($name)
    {
        return $this->getValue($name);
    }
    
    public function getValue($name)
    {
        if (!isset($this->aStrings[$name])){
            return null;
        }
        return $this->aStrings[$name];
    }
}