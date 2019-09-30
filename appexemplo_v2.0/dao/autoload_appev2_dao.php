<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.9.0-alpha
 * FormDin Version: 4.7.5
 * 
 * System appev2 created in: 2019-09-10 11:29:00
 */

if ( !function_exists( 'appev2_dao_autoload') ) {
    function appev2_dao_autoload( $class_name )
    {
        $path = __DIR__.DS.$class_name.'.class.php';
        if (file_exists($path)){
            require_once $path;
        } else {
            return false;
        }
    }
spl_autoload_register('appev2_dao_autoload');
}