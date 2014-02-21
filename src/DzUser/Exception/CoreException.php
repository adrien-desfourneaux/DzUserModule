<?php

/**
* Exception de base
*
* PHP version 5.3.3
*
* @category Source
* @package  DzUser/Exception
* @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
* @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
* @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Exception/CoreException.php
*/

namespace DzUser\Exception\CoreException;

/**
* Exception qui sert de base aux exceptions de DzUser
*
* @category Source
* @package  DzUser/Exception
* @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
* @license  http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2
* @link     https://github.com/dieze/DzUser/blob/master/src/DzUser/Exception/CoreException.php
*/
abstract class CoreException extends \Exception
{
    protected $message = 'Unknown exception';
    protected $code = 0;
    protected $file;
    protected $line;

    public function __construct($message = null, $code = 0)
    {
        if (!$message) {
            throw new $this('Unknown '. get_class($this));
        }
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        return "<pre>" .
                  get_class($this) . ": {$this->message}\n{$this->file}({$this->line})\n\n"
                                   . "{$this->getTraceAsString()}"
             . "</pre>";
    }
}