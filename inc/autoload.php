<?php
/*-----------------------------------------------------------------------------
Register Autoloaders
-----------------------------------------------------------------------------*/

/**
*   Register theme plugins autoloader. Theme plugins must follow naming convention of
*   folder matching namespace and filename matching class name.
*/
spl_autoload_register(function($cls) {

    if(class_exists($cls,false)) {
        return;
    }

    $segments = explode("\\",$cls);
    $classname = array_pop($segments);

    $plugins_path = realpath(__DIR__.'/../plugins');

    if(!$plugins_path) {
        return;
    }

    $dir_iterator = new RecursiveDirectoryIterator($plugins_path);
    $iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);

    foreach($iterator as $path) {
        if(!$path->isFile()) {
            continue;
        }
        $pathname = str_replace("\\","/",$path->getPathName());
        $filename = basename($pathname);

        $dirpath = ($segments) ? implode('/',$segments)."/" : '';

        if(!preg_match("#plugins/".preg_quote($dirpath.$classname)."\.php$#ismu",$pathname)) {
            continue;
        }

        require_once($pathname);

        if(class_exists($cls,false)) { return; }
    }

});