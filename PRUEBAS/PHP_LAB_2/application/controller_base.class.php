<?php

Abstract Class baseController {

/*
 * @registry object
 */
protected $registry;

function __construct($registry) {
	$this->registry = $registry;
	$this->onConstruct();
}

/**
 * @all controllers must contain an index method
 */
abstract function index();

abstract function onConstruct();

function redirect($url, $code = 302)
{
    if (strncmp('cli', PHP_SAPI, 3) !== 0)
    {
        if (headers_sent() !== true)
        {
            if (strlen(session_id()) > 0) // if using sessions
            {
                session_regenerate_id(true); // avoids session fixation attacks
                session_write_close(); // avoids having sessions lock other requests
            }

            if (strncmp('cgi', PHP_SAPI, 3) === 0)
            {
                header(sprintf('Status: %03u', $code), true, $code);
            }

            header('Location: ' . $url, true, (preg_match('~^30[1237]$~', $code) > 0) ? $code : 302);
        }

        exit();
    }
}

}

?>
