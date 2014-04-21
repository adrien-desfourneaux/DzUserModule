<?php

/**
* Exception de base
*
* PHP version 5.3.3
*
* @category Source
* @package  DzUserModule/Exception
* @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
* @license  http://www.opensource.org/licenses/mit-license.html  MIT License
* @link     https://github.com/dieze/DzUserModule
*/

namespace DzUserModule\Exception\CoreException;

/**
* Exception qui sert de base aux exceptions de DzUser
*
* @category Source
* @package  DzUserModule/Exception
* @author   Adrien Desfourneaux (aka Dieze) <dieze51@gmail.com>
* @license  http://www.opensource.org/licenses/mit-license.html  MIT License
* @link     https://github.com/dieze/DzUserModule
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
