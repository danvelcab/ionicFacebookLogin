<?php
/**
 * Created by PhpStorm.
 * Users: Daniel
 * Date: 17/01/2017
 * Time: 12:21
 */

namespace App\Exceptions;


class FacebookLoginProjectException extends \Exception
{
    public function __construct($message, $code = 500, \Exception $previous = null) {

        parent::__construct($message, $code, $previous);
    }
}